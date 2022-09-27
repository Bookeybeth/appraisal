import sqlalchemy as db
from sqlalchemy.sql import func
from sqlalchemy.orm import declarative_base, relationship, backref
Base = declarative_base()

engine = db.create_engine("mysql+pymysql://root@localhost/appraisal")
print(engine)


class Users(Base):
    __tablename__ = 'users'

    id = db.Column(db.Integer, primary_key=True)
    fname = db.Column(db.String(255))
    lname = db.Column(db.String(255))
    username = db.Column(db.String(255), unique=True)
    email = db.Column(db.String(255), unique=True)
    pwd = db.Column(db.String(255))
    timestamp = db.Column(db.TIMESTAMP, server_default=func.now())

    admin = relationship("Admin", uselist=False, backref="admin_user")
    director = relationship("Director", uselist=False, backref="director_user")
    director = relationship("Userappraisal", backref="userappraisal_user")

class Admin(Base):
    __tablename__ = 'admin'

    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, db.ForeignKey('users.id'))

class Director(Base):
    __tablename__ = 'director'

    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, db.ForeignKey('users.id'))

class Appraisal(Base):
    __tablename__ = 'appraisal'

    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(255))
    content = db.Column(db.String(1000))
    timestamp = db.Column(db.TIMESTAMP, server_default=func.now())

    director = relationship("Userappraisal", backref="userappraisal_appraisal")

class Userappraisal(Base):
    __tablename__ = 'userappraisal'

    id = db.Column(db.Integer, primary_key=True)
    approval = db.Column(db.Boolean, default=False)
    dapproval = db.Column(db.Boolean, default=False)
    timestamp = db.Column(db.TIMESTAMP, server_default=func.now())

    appraisal_id = db.Column(db.Integer, db.ForeignKey('appraisal.id'))
    user_id = db.Column(db.Integer, db.ForeignKey('users.id'))

    director = relationship("Ratings", backref="ratings_userappraisal")

class Ratings(Base):
    __tablename__ = 'ratings'

    id = db.Column(db.Integer, primary_key=True)
    irating = db.Column(db.Integer)
    arating = db.Column(db.Integer)
    dirating = db.Column(db.Integer)
    darating = db.Column(db.Integer)
    
    userappraisal_id = db.Column(db.Integer, db.ForeignKey('userappraisal.id'))

Base.metadata.create_all(engine)