from flask import Flask
from flask import jsonify
from config import config
from models import db
from models import Usuario
from models import Usuario_tiene_moneda
from models import Precio_moneda
from models import Pais
from models import Moneda
from models import Cuenta_bancaria
from flask import request

def create_app(enviroment):
	app = Flask(__name__)
	app.config.from_object(enviroment)
	with app.app_context():
		db.init_app(app)
		db.create_all()
	return app

# Accedemos a la clase config del archivo config.py
enviroment = config['development']
app = create_app(enviroment)

#---------------------------#
#			USUARIO			#
#---------------------------#

# Se obtienen todos los usuarios
@app.route('/api/usuario', methods=['GET'])
def get_usuarios():
	usuarios = [ usuario.json() for usuario in Usuario.query.all() ] 
	return jsonify({'usuarios': usuarios })

@app.route('/api/usuario', methods=['POST'])
def create_usuario():
	json = request.get_json(force=True)

	if (json.get('nombre') is None) or (json.get('correo') is None) or (json.get('contraseña') is None) or (json.get('pais') is None) or (json.get('fecha') is None) or (json.get('admin') is None):
		return jsonify({'message': 'El formato está mal'}), 400

	usuario = Usuario.create(json['nombre','apellido','correo','contraseña','pais','admin'])

	return jsonify({'usuario': usuario.json() })

@app.route('/api/usuario', methods=['PUT'])
def update_usuario(id):
	usuario = Usuario.query.filter_by(id=id).first()
	if usuario is None:
		return jsonify({'message': 'El usuario no existe'}), 404
	json = request.get_json(force=True)
	if (json.get('nombre') is None) or (json.get('correo') is None) or (json.get('contraseña') is None) or (json.get('pais') is None) or (json.get('fecha') is None) or (json.get('admin') is None):
		return jsonify({'message': 'Solicitud Incorrecta'}), 400
	usuario.nombre = json['nombre']
	if json.get('apellido') is None:
		usuario.apellido = None
	else:
		usuario.apellido = json['apellido']
	usuario.correo = json['correo']
	usuario.contraseña = json['contraseña']
	usuario.pais = json['pais']
	usuario.admin = json['admin']
	usuario.update()
	return jsonify({'usuario': usuario.json() })

# Endpoint para eliminar el usuario con id igual a <id>
@app.route('/api/usuario', methods=['DELETE'])
def delete_usuario(id):
	usuario = Usuario.query.filter_by(id=id).first()
	if usuario is None:
		return jsonify({'message': 'El usuario no existe'}), 404

	usuario.delete()

	return jsonify({'usuario': usuario.json() })

#---------------------------#
#	USUARIO_TIENE_MONEDA	#
#---------------------------#
	
# Se obtienen todos los usuario_tiene_monedas
@app.route('/api/usuario_tiene_moneda', methods=['GET'])
def get_usuario_tiene_monedas():
	usuarios_tiene_monedas = [ usuario_tiene_moneda.json() for usuario_tiene_moneda in Usuario_tiene_moneda.query.all() ] 
	return jsonify({'usuarios_tiene_monedas': usuarios_tiene_monedas })

# Se crean los usuario_tiene_monedas
@app.route('/api/usuario_tiene_moneda', methods=['POST'])
def create_usuario_tiene_moneda():
	json = request.get_json(force=True)

	if (json.get('balance') is None) or (json.get('id_usuario') is None) or (json.get('id_moneda') is None):
		return jsonify({'message': 'El formato está mal'}), 400

	usuario_tiene_moneda = Usuario_tiene_moneda.create(json['id_usuario','id_moneda','balance'])

	return jsonify({'usuario_tiene_moneda': usuario_tiene_moneda.json() })

# Se actualizan los usuario_tiene_monedas
@app.route('/api/usuario_tiene_moneda', methods=['PUT'])
def update_usuario_tiene_moneda(id):
	usuario_tiene_moneda = Usuario_tiene_moneda.query.filter_by(id=id).first()
	if usuario_tiene_moneda is None:
		return jsonify({'message': 'El usuario no existe'}), 404
	json = request.get_json(force=True)
	if (json.get('balance') is None) or (json.get('id_usuario') is None) or (json.get('id_moneda') is None):
		return jsonify({'message': 'Solicitud Incorrecta'}), 400
	usuario_tiene_moneda.balance = json['balance']
    usuario_tiene_moneda.id_usuario = json['id_usuario']
    usuario_tiene_moneda.id_moneda = json['id_moneda']
	usuario_tiene_moneda.update()
	return jsonify({'usuario_tiene_moneda': usuario_tiene_moneda.json() })

# Se eliminan los usuario_tiene_monedas
@app.route('/api/usuario_tiene_moneda', methods=['DELETE'])
def delete_usuario_tiene_moneda(id):
	usuario_tiene_moneda = Usuario_tiene_moneda.query.filter_by(id=id).first()
	if usuario_tiene_moneda is None:
		return jsonify({'message': 'El usuario no existe'}), 404

	usuario_tiene_moneda.delete()

	return jsonify({'usuario_tiene_moneda': usuario_tiene_moneda.json() })

#---------------------------#
#	    PRECIO MONEDA	    #
#---------------------------#

# Se obtienen todos los precio_monedas
@app.route('/api/precio_moneda', methods=['GET'])
def get_precio_monedas():
	precio_monedas = [ precio_moneda.json() for precio_moneda in Precio_moneda.query.all() ] 
	return jsonify({'precio_monedas': precio_monedas })

# Se crean los precio_monedas
@app.route('/api/precio_moneda', methods=['POST'])
def create_precio_moneda():
	json = request.get_json(force=True)

	if (json.get('id_moneda') is None) or (json.get('valor') is None):
		return jsonify({'message': 'El formato está mal'}), 400

	precio_moneda = Precio_moneda.create(json['id_moneda','valor'])

	return jsonify({'precio_moneda': precio_moneda.json() })

# Se actualizan los precio_monedas
@app.route('/api/precio_moneda', methods=['PUT'])
def update_precio_moneda(id):
	precio_moneda = Precio_moneda.query.filter_by(id=id).first()
	if precio_moneda is None:
		return jsonify({'message': 'El usuario no existe'}), 404
	json = request.get_json(force=True)
	if (json.get('id_moneda') is None) or (json.get('valor') is None):
		return jsonify({'message': 'Solicitud Incorrecta'}), 400
	precio_moneda.id_moneda = json['id_moneda']
    precio_moneda.valor = json['valor']
	precio_moneda.update()
	return jsonify({'precio_moneda': precio_moneda.json() })

# Se eliminan los precio_monedas
@app.route('/api/precio_moneda', methods=['DELETE'])
def delete_precio_moneda(id):
	precio_moneda = Precio_moneda.query.filter_by(id=id).first()
	if precio_moneda is None:
		return jsonify({'message': 'El usuario no existe'}), 404

	precio_moneda.delete()

	return jsonify({'precio_moenda': precio_moneda.json() })
	
#---------------------------#
#			PAIS			#
#---------------------------#

# Se obtienen todos los paises
@app.route('/api/pais', methods=['GET'])
def get_paises():
	paises = [ pais.json() for pais in Pais.query.all() ] 
	return jsonify({'paises': paises })

# Se crean los paises
@app.route('/api/pais', methods=['POST'])
def create_pais():
	json = request.get_json(force=True)

	if (json.get('nombre') is None):
		return jsonify({'message': 'El formato está mal'}), 400

	pais = Pais.create(json['nombre'])

	return jsonify({'pais': pais.json() })

# Se actualizan los paises
@app.route('/api/pais', methods=['PUT'])
def update_pais(id):
	pais = Pais.query.filter_by(id=id).first()
	if pais is None:
		return jsonify({'message': 'El usuario no existe'}), 404
	json = request.get_json(force=True)
	if (json.get('nombre') is None):
		return jsonify({'message': 'Solicitud Incorrecta'}), 400
	pais.nombre = json['nombre']
	pais.update()
	return jsonify({'pais': pais.json() })

# Se eliminan los paises
@app.route('/api/pais', methods=['DELETE'])
def delete_user(id):
	pais = Pais.query.filter_by(id=id).first()
	if pais is None:
		return jsonify({'message': 'El usuario no existe'}), 404

	pais.delete()

	return jsonify({'pais': pais.json() })

#---------------------------#
#	      MONEDA            #
#---------------------------#

# Se obtienen todas las monedas
@app.route('/api/moneda', methods=['GET'])
def get_monedas():
	monedas = [ moneda.json() for moneda in Moneda.query.all() ] 
	return jsonify({'monedas': monedas })

# Se crean nuevas monedas
@app.route('/api/moneda', methods=['POST'])
def create_moneda():
	json = request.get_json(force=True)

	if (json.get('sigla') is None) or (json.get('nombre') is None):
		return jsonify({'message': 'El formato está mal'}), 400

	moneda = Moneda.create(json['sigla','nombre'])

	return jsonify({'moneda': moneda.json() })

# Se actualizan nuevas monedas
@app.route('/api/moneda', methods=['PUT'])
def update_moneda(id):
	moneda = Moneda.query.filter_by(id=id).first()
	if moneda is None:
		return jsonify({'message': 'El usuario no existe'}), 404
	json = request.get_json(force=True)
	if (json.get('sigla') is None) or (json.get('nombre') is None):
		return jsonify({'message': 'Solicitud Incorrecta'}), 400
	moneda.sigla = json['sigla']
    moneda.nombre = json['nombre']
	moneda.update()
	return jsonify({'moneda': moneda.json() })

# Se eliminan nuevas monedas
@app.route('/api/moneda', methods=['DELETE'])
def delete_moneda(id):
	moneda = Moneda.query.filter_by(id=id).first()
	if moneda is None:
		return jsonify({'message': 'El usuario no existe'}), 404

	moneda.delete()

	return jsonify({'moneda': moneda.json() })

#---------------------------#
#     CUENTA BANCARIA       #
#---------------------------#

# Se obtienen todas las cuentas_bancarias
@app.route('/api/cuenta_bancaria', methods=['GET'])
def get_cuentas_bancarias():
	cuentas_bancarias = [ cuenta_bancaria.json() for cuenta_bancaria in Cuenta_bancaria.query.all() ] 
	return jsonify({'cuentas_bancarias': cuentas_bancarias })

# Se crea nueva cuenta_bancaria
@app.route('/api/cuenta_bancaria', methods=['POST'])
def create_cuenta_bancaria():
	json = request.get_json(force=True)

	if (json.get('id_usuario') is None) or (json.get('balance') is None):
		return jsonify({'message': 'El formato está mal'}), 400

	cuenta_bancaria = Cuenta_bancaria(json['id_usuario','balance'])

	return jsonify({'cuenta_bancaria': cuenta_bancaria.json()})

# Se actuaizan nueva cuenta_bancaria
@app.route('/api/cuenta_bancaria', methods=['PUT'])
def update_cuenta_bancaria(id):
	cuenta_bancaria = Cuenta_bancaria.query.filter_by(id=id).first()
	if cuenta_bancaria is None:
		return jsonify({'message': 'El usuario no existe'}), 404
	json = request.get_json(force=True)
	if (json.get('id_usuario') is None) or (json.get('balance') is None):
		return jsonify({'message': 'Solicitud Incorrecta'}), 400
	cuenta_bancaria.id_usuario = json['id_usuario']
    cuenta_bancaria.balance = json['balance']
	cuanta_bancaria.update()
	return jsonify({'cuenta_bancaria': cuenta_bancaria.json() })

# Se eliminan nueva cuenta_bancaria
@app.route('/api/cuenta_bancaria', methods=['DELETE'])
def delete_cuenta_bancaria(id):
	cuenta_bancaria = Cuenta_bancaria.query.filter_by(id=id).first()
	if cuenta_bancaria is None:
		return jsonify({'message': 'El usuario no existe'}), 404

	cuenta_bancaria.delete()

	return jsonify({'cuenta_bancaria': cuenta_bancaria.json() })


if __name__ == '__main__':
	app.run(debug=True)

