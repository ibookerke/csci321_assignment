/* query1 */
select d.disease_code, d.description
from disease d
         left join discover dc on dc.disease_code = d.disease_code
where d.pathogen = 'bacteria'
  and dc.first_enc_date < '1990-01-01';

/* query2 */
select distinct u.name, u.surname, doc.degree
from specialize s
         left join doctor doc on doc.email = s.email
         left join users u on u.email = doc.email
where doc.email not in (select email from specialize where id in (select id from diseasetype where description ilike 'infectious diseases'));


/* query3 */
select distinct u.name, u.surname, doc.degree
from doctor doc
         left join specialize s on doc.email = s.email
         left join users u on u.email = doc.email
where doc.email in (
    select s.email from specialize s
    group by s.email having count(*) > 2
);


/* query4 */
select c.cname, coalesce(avg(
    case when s.id in (select id
    from diseasetype
    where description ilike 'virology')
        then u.salary end),
0) as average_salary
from doctor doc
         join users u on doc.email = u.email
         full join country c on u.cname = c.cname
         full join specialize s on u.email = s.email
group by c.cname;

/* query5 */
select p.department, count(DISTINCT p.email) as county_count
from record r
         inner join publicservant p on r.email = p.email
where r.disease_code = 'covid-19'
group by p.department
having count(DISTINCT cname) > 1;

/* query6 */
update users
set salary = salary * 2
where email in (select p.email
                from record r
                         inner join publicservant p on r.email = p.email
                where disease_code = 'covid-19'
                group by p.email
                having count('*') > 3);

/* query7 */
delete from users where email in (select email from users
                                  where name ilike '%bek%'
                     or name ilike '%gul%');


/* query8 */
create index idx_pathogen on disease(pathogen);

/* query9 */
select distinct p.email, u.name, p.department
from publicservant p
         join users u on p.email = u.email
         join record r on p.email = r.email
where r.total_patients between 100000 and 999999;

/* query10 */
select c.cname, sum(r.total_patients ) as total_patients
from country c
         join record r on c.cname = r.cname
group by c.cname
order by total_patients desc
    limit 5;

/* query11 */
select dt.description, sum(r.total_patients) as patients_treated
from disease d
         join diseasetype dt on d.id = dt.id
         join record r on d.disease_code = r.disease_code
group by dt.description;
