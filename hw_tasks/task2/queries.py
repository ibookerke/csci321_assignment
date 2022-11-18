import sqlalchemy
from sqlalchemy import create_engine

pgsql = {
    'user': 'postgres',
    'pwd': 'root',
    'host': 'localhost',
    'port': 5432,
    'db': 'hw2'
}

def getUrl(settings):
    return f"postgresql://{settings['user']}:{settings['pwd']}@{settings['host']}:{settings['port']}/{settings['db']}"

engine = create_engine(getUrl(pgsql))
connection = engine.connect()

#query1
print("\n==============================Query1==============================\n")
result1 = connection.execute("select d.disease_code, d.description from disease d left join discover dc on dc.disease_code = d.disease_code where d.pathogen = 'bacteria' and dc.first_enc_date < '1990-01-01';")
print(result1.all())

#query2
print("\n==============================Query2==============================\n")
result2 = connection.execute("select distinct u.name, u.surname, doc.degree from specialize s left join doctor doc on doc.email = s.email left join users u on u.email = doc.email where doc.email not in (select email from specialize where id in (select id from diseasetype where description ilike 'infectious diseases'));")
print(result2.all())

#query3
print("\n==============================Query3==============================\n")
result3 = connection.execute("select distinct u.name, u.surname, doc.degree from doctor doc left join specialize s on doc.email = s.email left join users u on u.email = doc.email where doc.email in ( select s.email from specialize s group by s.email having count(*) > 2 );")
print(result3.all())

#query4
print("\n==============================Query4==============================\n")
result4 = connection.execute("select c.cname, coalesce(avg( case when s.id in (select id from diseasetype where description ilike 'virology') then u.salary end), 0) as average_salary from doctor doc join users u on doc.email = u.email full join country c on u.cname = c.cname full join specialize s on u.email = s.email group by c.cname;")
print(result4.all())

#query5
print("\n==============================Query5==============================\n")
result5 = connection.execute("select p.department, count(DISTINCT p.email) as county_count from record r inner join publicservant p on r.email = p.email where r.disease_code = 'covid-19' group by p.department having count(DISTINCT cname) > 1;")
print(result5.all())

#query6
print("\n==============================Query6==============================\n")
result6 = connection.execute("update users set salary = salary * 2 where email in (select p.email from record r inner join publicservant p on r.email = p.email where disease_code = 'covid-19' group by p.email having count('*') > 3);")
print("something was updated")

#query7
print("\n==============================Query7==============================\n")
result7 = connection.execute("delete from users where email in (select email from users where name ilike '%%bek%%' or name ilike '%%gul%%')")
print('something was deleted')

#query8
print("\n==============================Query8==============================\n")
result8 = connection.execute("create index idx_pathogen on disease(pathogen);")
print('some index was added')

#query9
print("\n==============================Query9==============================\n")
result9 = connection.execute("select distinct p.email, u.name, p.department from publicservant p join users u on p.email = u.email join record r on p.email = r.email where r.total_patients between 100000 and 999999;")
print(result9.all())

#query10
print("\n==============================Query10==============================\n")
result10 = connection.execute("select c.cname, sum(r.total_patients ) as total_patients from country c join record r on c.cname = r.cname group by c.cname order by total_patients desc limit 5;")
print(result10.all())

#query11
print("\n==============================Query11==============================\n")
result11 = connection.execute("select dt.description, sum(r.total_patients) as patients_treated from disease d join diseasetype dt on d.id = dt.id join record r on d.disease_code = r.disease_code group by dt.description;")
print(result11.all())
