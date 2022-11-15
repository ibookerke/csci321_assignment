import sqlalchemy
from sqlalchemy import create_engine
from connection import pgsql


def getUrl(settings):
    return f"postgresql://{settings['user']}:{settings['pwd']}@{settings['host']}:{settings['port']}/{settings['db']}"


engine = create_engine(getUrl(pgsql))
lala = engine.connect().execute("select * from diseaseType")

print(lala.all())

