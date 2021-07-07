from datetime import datetime
from flask_sqlalchemy import SQLAlchemy
# Importamos para realizar consultas personalizadas
from sqlalchemy import text

db = SQLAlchemy()

class Usuario(db.Model):
    __tablename__ = 'usuario'
	
    id = db.Column(db.Integer, primary_key=True)
    nombre = db.Column(db.String(50), nullable=False)
    apellido = db.Column(db.String(50), nullable=True) 
    correo = db.Column(db.String(50), nullable=False) 
    contraseña = db.Column(db.String(225), nullable=False) 
    pais = db.Column(db.Integer, db.ForeignKey('pais.cod_pais'))
    paisPK = db.relationship("Pais")
    fecha = db.Column(db.DateTime, nullable=False, default=db.func.current_timestamp())
    usuario_tiene_moneda = db.relationship('Usuario_tiene_moneda', cascade = "all,delete", backref = "parent", lazy = 'dynamic')
    cuenta_bancaria = db.relationship('Cuenta_bancaria',  cascade = "all,delete", backref = "parent", lazy = 'dynamic')
    
    @classmethod
    def create(cls,nombre,correo,contraseña,pais,apellido):
        # Instanciamos un nuevo registro y lo guardamos en la bd
        usuario = Usuario(nombre = nombre, correo = correo, contraseña = contraseña, pais=pais, apellido = apellido)
        return usuario.save()

    def save(self):
        try:
            db.session.add(self)
            db.session.commit()

            return self
        except:
            return False

    def json(self):
        return {
            'id': self.id,
            'nombre': self.nombre,
            'apellido': self.apellido,
            'correo': self.correo,
            'fecha': self.fecha,
            'contraseña': self.contraseña,
            'pais': self.pais
        }

    def update(self):
        self.save()

    def delete(self):
        try:
            db.session.delete(self)
            db.session.commit()

            return True
        except:
            return False

class Usuario_tiene_moneda(db.Model):
    __tablename__ = 'usuario_tiene_moneda'
    id_usuario = db.Column(db.Integer, db.ForeignKey('usuario.id'), primary_key = True)
    usuario = db.relationship("Usuario")
    id_moneda = db.Column(db.Integer, db.ForeignKey('moneda.id'), primary_key = True)
    moneda = db.relationship("Moneda")
    balance = db.Column(db.Float, nullable=False)
    
    @classmethod
    def create(cls, id_usuario, id_moneda, balance):
        usuario_tiene_moneda = Usuario_tiene_moneda(id_usuario = id_usuario, id_moneda = id_moneda, balance = balance)
        return usuario_tiene_moneda.save()

    def save(self):
        try:
            db.session.add(self)
            db.session.commit()

            return self
        except:
            return False

    def json(self):
        return {
            'id_usuario': self.id_usuario,
            'id_moneda': self.id_moneda,
            'balance': self.balance
        }

    def update(self):
        self.save()

    def delete(self):
        try:
            db.session.delete(self)
            db.session.commit()

            return True
        except:
            return False

class Precio_moneda(db.Model):
    __tablename__ = 'precio_moneda'
    id_moneda = db.Column(db.Integer, db.ForeignKey('moneda.id'), primary_key = True) 
    moneda = db.relationship("Moneda")
    fecha = db.Column(db.DateTime, default=db.func.current_timestamp(), primary_key=True)
    valor = db.Column(db.Float, nullable=False) 

    @classmethod
    def create(cls, id_moneda, valor):
        precio_moneda = Precio_moneda(id_moneda = id_moneda, valor = valor)
        return precio_moneda.save()

    def save(self):
        try:
            db.session.add(self)
            db.session.commit()

            return self
        except:
            return False

    def json(self):
        return {
            'id_moneda': self.id_moneda,
            'fecha': self.fecha,
            'valor': self.valor
        }

    def update(self):
            self.save()

    def delete(self):
        try:
            db.session.delete(self)
            db.session.commit()

            return True
        except:
            return False

class Pais(db.Model):
    __tablename__ = 'pais'
    cod_pais = db.Column(db.Integer, primary_key=True) 
    nombre = db.Column(db.String(45), nullable=False) 
    usuario = db.relationship('Usuario',  cascade = "all,delete", backref = "parent", lazy = 'dynamic')

    @classmethod
    def create(cls, nombre):
        pais = Pais(nombre = nombre)
        return pais.save()

    def save(self):
        try:
            db.session.add(self)
            db.session.commit()

            return self
        except:
            return False

    def json(self):
        return {
            'cod_pais': self.cod_pais,
            'nombre': self.nombre
        }

    def update(self):
        self.save()

    def delete(self):
        try:
            db.session.delete(self)
            db.session.commit()

            return True
        except:
            return False

class Moneda(db.Model):
    __tablename__ = 'moneda'
    id = db.Column(db.Integer, primary_key=True)
    sigla = db.Column(db.String(10), nullable=False)
    nombre = db.Column(db.String(80), nullable=False) 
    precio_moneda = db.relationship('Precio_moneda',  cascade = "all,delete", backref = "parent", lazy = 'dynamic')
    usuario_tiene_moneda = db.relationship('Usuario_tiene_moneda',  cascade = "all,delete", lazy = 'dynamic')

    @classmethod
    def create(cls, sigla, nombre):
        moneda = Moneda(sigla=sigla, nombre=nombre)
        return moneda.save()

    def save(self):
        try:
            db.session.add(self)
            db.session.commit()

            return self
        except:
            return False
    
    def json(self):
        return {
            'id': self.id,
            'sigla': self.sigla,
            'nombre': self.nombre
        }

    def update(self):
        self.save()

    def delete(self):
        try:
            db.session.delete(self)
            db.session.commit()

            return True
        except:
            return False


class Cuenta_bancaria(db.Model):
    __tablename__ = 'cuenta_bancaria'
    numero_cuenta = db.Column(db.Integer, primary_key=True)
    id_usuario = db.Column(db.Integer, db.ForeignKey('usuario.id'))
    balance = db.Column(db.Float, nullable=False)

    @classmethod
    def create(cls, id_usuario, balance):
        # Instanciamos un nuevo registro y lo guardamos en la bd
        cuenta_bancaria =  Cuenta_bancaria(id_usuario=id_usuario, balance=balance)
        return cuenta_bancaria.save()

    def save(self):
        try:
            db.session.add(self)
            db.session.commit()

            return self
        except:
            return False

    def json(self):
        return {
            'numero_cuenta': self.numero_cuenta,
            'id_usuario': self.id_usuario,
            'balance': self.balance
        }

    def update(self):
        self.save()

    def delete(self):
        try:
            db.session.delete(self)
            db.session.commit()

            return True
        except:
            return False
