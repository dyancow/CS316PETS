from sqlalchemy import sql, orm
from app import db

class Pet_listings(db.):
    __tablename__ = "pet listings"
    name = db.Column('id', db.Integer())
    
