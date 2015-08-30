<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Acordes\Role as role;
use Acordes\Permission as permisos;
use Acordes\User;
use Acordes\Datos;
use Acordes\Cargos;
use Acordes\Menus;
use Acordes\Opciones;
use Acordes\Promociones;
use Acordes\Redes;
use Acordes\Servicios;
use Acordes\Preguntas;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
    public function run()
    {
        Model::unguard();
        $this->call('RegistrosIniciales');
    }
}
class RegistrosIniciales extends Seeder {

    public function run()
    {
//-------------------------------------------ROLES

        $admin = role::create( [
            'name' => 'administrador',
            'display_name' => 'Administrador',
            'description' => 'Este es el tipo de usuario que tiene acceso a todo tipo de actividades en el sitio.'
        ] );

        $cocinero = role::create( [
            'name' => 'cocinero',
            'display_name' => 'Cociner@',
            'description' => 'Este usuario tiene permiso de ver y editar en el modulo de Menu.'
        ] );

        $mesero = role::create( [
            'name' => 'mesero',
            'display_name' => 'Mesero',
            'description' => 'Este usuario tiene permiso de ver y editar en los modulos de Promociones, Redes Sociales, Menu, y FAQ.'
        ] );

        $bartender = role::create( [
            'name' => 'bartender',
            'display_name' => 'Bartender',
            'description' => 'Este usuario tiene permiso de ver y editar en los modulos de Promociones, Redes Sociales, Menu, y FAQ.'
        ] );

        $clientes = role::create( [
            'name' => 'cliente',
            'display_name' => 'Cliente',
            'description' => 'Este usuario sera quien tenga acceso a las reservaciones.'
        ] );

//-------------------------------------------PERMISOS

        $cargos = permisos::create([
            'name' => 'crud-cargos',
            'display_name' => 'Cargos',
            'description' => 'Permite crear y editar contenido de los cargos.'
        ]);

        $clientes = permisos::create([
            'name' => 'crud-clientes',
            'display_name' => 'Clientes',
            'description' => 'Permite crear y editar contenido de los clientes.'
        ]);

        $datos = permisos::create( [
            'name' => 'crud-datos',
            'display_name' => 'Informacion Empresarial',
            'description' => 'Permite crear y editar informacion de la empresa.'
        ] );

        $empleados = permisos::create( [
            'name' => 'crud-empleados',
            'display_name' => 'Empleados',
            'description' => 'Permite crear y editar contenido del empleados de trabajo.'
        ] );

        $menu = permisos::create( [
            'name' => 'crud-menu',
            'display_name' => 'Menu',
            'description' => 'Permite crear y editar contenido del menu.'
        ] );

        $preguntas = permisos::create( [
            'name' => 'crud-preguntas',
            'display_name' => 'Preguntas',
            'description' => 'Permite crear y editar informacion de las Preguntas Frecuentes.'
        ] );

        $promo = permisos::create( [
            'name' => 'crud-promociones',
            'display_name' => 'Promociones',
            'description' => 'Permite crear y editar contenido de las promociones.'
        ] );

        $redes = permisos::create( [
            'name' => 'crud-redes',
            'display_name' => 'Redes Sociales',
            'description' => 'Permite crear y editar contenido de las redes sociales.'
        ] );

        $reservaciones = permisos::create( [
            'name' => 'crud-reservaciones',
            'display_name' => 'Reservaciones',
            'description' => 'Permite crear y editar contenido de las reservaciones.'
        ] );

        $servicios = permisos::create( [
            'name' => 'crud-servicios',
            'display_name' => 'Servicios',
            'description' => 'Permite crear y editar contenido de los servicios.'
        ] );

        $users = permisos::create( [
            'name' => 'crud-usuarios',
            'display_name' => 'Usuarios',
            'description' => 'Permite crear y editar usuarios.'
        ] );

//-------------------------------------------USUARIOS

        $user = User::create( [
            'name' => 'luis' ,
            'email' => 'luis@restauranteacordes.com' ,
            'password' => Hash::make('luis'),
            'type' => 0,
        ] );

        $user2 = User::create( [
            'name' => 'rene' ,
            'email' => 'rene@restauranteacordes.com' ,
            'password' => Hash::make('rene'),
            'type' => 0,
        ] );

        $user3 = User::create( [
            'name' => 'isaac' ,
            'email' => 'isaac@restauranteacordes.com' ,
            'password' => Hash::make('isaac'),
            'type' => 0,
        ] );

        $user4 = User::create( [
            'name' => 'nathaly' ,
            'email' => 'nathaly@restauranteacordes.com' ,
            'password' => Hash::make('nathaly'),
            'type' => 0,
        ] );

        $user5 = User::create( [
            'name' => 'nestor' ,
            'email' => 'nestor@restauranteacordes.com' ,
            'password' => Hash::make('nestor'),
            'type' => 0,
        ] );

        $user6 = User::create( [
            'name' => 'juan' ,
            'email' => 'juan@gmail.com' ,
            'password' => Hash::make('juan'),
            'type' => 1,
        ] );

//---------------------------------------ASIGNACION DE ROLES Y PERMISOS

        $user->attachRole($admin);
        $user2->attachRole($cocinero);
        $user3->attachRole($mesero);
        $user4->attachRole($bartender);
        $user5->attachRole($mesero);

        $admin->attachPermission($cargos);
        $admin->attachPermission($clientes);
        $admin->attachPermission($datos);
        $admin->attachPermission($empleados);
        $admin->attachPermission($menu);
        $admin->attachPermission($preguntas);
        $admin->attachPermission($promo);
        $admin->attachPermission($redes);
        $admin->attachPermission($reservaciones);
        $admin->attachPermission($servicios);
        $admin->attachPermission($users);

        $cocinero->attachPermission($menu);
        $cocinero->attachPermission($reservaciones);
        $cocinero->attachPermission($preguntas);

        $mesero->attachPermission($menu);
        $mesero->attachPermission($preguntas);
        $mesero->attachPermission($promo);
        $mesero->attachPermission($redes);

        $bartender->attachPermission($menu);
        $bartender->attachPermission($preguntas);
        $bartender->attachPermission($promo);

//----------------------------------------REGISTROS INICIALES

        //Promociones
        $promocion1 = Promociones::create([
            'nombre' => 'Pilsener al 2x1',
            'descripcion' => 'Todas las cervezas pilsener de todo tamano estaran en promocion al dos por el precio de una',
            'imagen' => 'pilsener2x1.jpg',
            'inicio' => '31-08-2014',
            'fin' => '31-09-2014'
        ]);

        $promocion1 = Promociones::create([
            'nombre' => 'All u can eat & Drink',
            'descripcion' => 'Por 50 dolares tienes puedes disfrutar de todo lo que quieras comer y beber!',
            'imagen' => 'eatdrink.jpg',
            'inicio' => '31-08-2014',
            'fin' => '31-09-2014'
        ]);

        //Datos
        $valores = Datos::create( [
            'nombre' => 'Valores' ,
            'contenido' => 'Vacio'
        ] );

        $mision = Datos::create( [
            'nombre' => 'Mision' ,
            'contenido' => 'Vacio'
        ] );

        $vision = Datos::create( [
            'nombre' => 'Vision' ,
            'contenido' => 'Vacio'
        ] );

        //Cargos
        $gerente = Cargos::create( [
            'nombre' => 'Gerente' ,
            'descripcion' => 'El cargo "Gerente" es asignado a la persona encargada que todo se esta realizando.'
        ] );

        $cocinero = Cargos::create( [
            'nombre' => 'Cocinero' ,
            'descripcion' => 'El cargo "Cocinero" es asignado a la persona encargada que todo en la cocina.'
        ] );

        $bartender = Cargos::create( [
            'nombre' => 'Bartender' ,
            'descripcion' => 'El cargo "Bartender" es asignado a la persona encargada que todo en la bar.'
        ] );

        $mesero = Cargos::create( [
            'nombre' => 'Mesero' ,
            'descripcion' => 'El cargo "Mesero" es asignado a la persona encargada que todo en las mesas.'
        ] );

        //Menus tipo[ 0 = Bebida, 1 = Comida]
        $sinAlcohol = Menus::create( [
            'nombre' => 'Bebidas Sin Alcohol' ,
            'descripcion' => 'Las bebidas sin alcohol estan destinadas para los menores de edad que visiten el lugar.',
            'tipo' => 0
        ] );

        $cervezas = Menus::create( [
            'nombre' => 'Cervezas' ,
            'descripcion' => 'Las famosas cervezas son la bebida mas comun entre adultos.',
            'tipo' => 0
        ] );

        $conAlcohol = Menus::create( [
            'nombre' => 'Bebidas Con Alcohol' ,
            'descripcion' => 'Las bebidas con alcohol estan destinadas para los mayores de edad que visiten el lugar.',
            'tipo' => 0
        ] );

        $calientes = Menus::create( [
            'nombre' => 'Bebidas Calientes' ,
            'descripcion' => 'Las bebidas calientes para tiempos de lluvia.',
            'tipo' => 0
        ] );

        $especiales = Menus::create( [
            'nombre' => 'Bebidas Especiales' ,
            'descripcion' => 'Las bebidas especiales son para aquellos valientes que quieran demostrar su fuerza.',
            'tipo' => 0
        ] );

        $calientes = Menus::create( [
            'nombre' => 'Botellas' ,
            'descripcion' => 'Las famosas botellas son para aquellos amigos que se reunen a pasar un buen rato.',
            'tipo' => 0
        ] );

        $paraPicar = Menus::create( [
            'nombre' => 'Para Picar' ,
            'descripcion' => 'El complemento perfecto para cualquier bebida.',
            'tipo' => 1
        ] );

        $platosFuertes = Menus::create( [
            'nombre' => 'Platos Fuertes' ,
            'descripcion' => 'Los platos fuertes no pueden faltar en aquellas reuniones familiares.',
            'tipo' => 1
        ] );

        $bocas = Menus::create( [
            'nombre' => 'Bocas' ,
            'descripcion' => 'Las bocas no pueden faltar al momento de tomar alguna bebida.',
            'tipo' => 1
        ] );

        $paninis = Menus::create( [
            'nombre' => 'Paninis' ,
            'descripcion' => 'Cuando sabes que necesitas comer algo o quieres algo para tus chicos no hacen falta los paninis.',
            'tipo' => 1
        ] );

        //Opciones
        $gaseosas = Opciones::create( [
            'nombre' => 'Gaseosas' ,
            'extra' => 'Todas' ,
            'descripcion' => 'Vacio',
            'imagen' => 'gaseosas.jpg',
            'costo' => 1,
            'menu' => 1
        ] );

        $limonada = Opciones::create( [
            'nombre' => 'Limonada' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'limonada.jpg',
            'costo' => 2,
            'menu' => 1
        ] );

        $naranjada = Opciones::create( [
            'nombre' => 'Naranjada' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'naranjada.jpg',
            'costo' => 3,
            'menu' => 1
        ] );

        $agua = Opciones::create( [
            'nombre' => 'Agua' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'agua.jpg',
            'costo' => 1,
            'menu' => 1
        ] );

        $teHelado = Opciones::create( [
            'nombre' => 'Te Helado' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'tehelado.jpg',
            'costo' => 2,
            'menu' => 1
        ] );

        $pilsener = Opciones::create( [
            'nombre' => 'Pilsener' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'pilsener.jpg',
            'costo' => 1.75,
            'menu' => 2
        ] );

        $golden = Opciones::create( [
            'nombre' => 'Golden' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'golden.jpg',
            'costo' => 1.75,
            'menu' => 2
        ] );

        $suprema = Opciones::create( [
            'nombre' => 'Suprema' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'suprema.jpg',
            'costo' => 2,
            'menu' => 2
        ] );

        $miller = Opciones::create( [
            'nombre' => 'Miller' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'miller.jpg',
            'costo' => 3,
            'menu' => 2
        ] );

        $corona = Opciones::create( [
            'nombre' => 'Corona' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'corona.jpg',
            'costo' => 3,
            'menu' => 2
        ] );

        $smirnoff = Opciones::create( [
            'nombre' => 'Smirnoff' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'smirnoff.jpg',
            'costo' => 3,
            'menu' => 2
        ] );

        $heineken = Opciones::create( [
            'nombre' => 'Heineken' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'heineken.jpg',
            'costo' => 3,
            'menu' => 2
        ] );

        $margarita = Opciones::create( [
            'nombre' => 'Margarita' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'margarita.jpg',
            'costo' => 3.50,
            'menu' => 3
        ] );

        $mojitoCubano = Opciones::create( [
            'nombre' => 'Mojito Cubano' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'mojitocubano.jpg',
            'costo' => 3.50,
            'menu' => 3
        ] );

        $cosmopolitan = Opciones::create( [
            'nombre' => 'Cosmopolitan' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'cosmopolitan.jpg',
            'costo' => 3.99,
            'menu' => 3
        ] );

        $pinacolada = Opciones::create( [
            'nombre' => 'Pina Colada' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'pinacolada.jpg',
            'costo' => 3.99,
            'menu' => 3
        ] );

        $caipirosca = Opciones::create( [
            'nombre' => 'Caipirosca' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'caipirosca.jpg',
            'costo' => 3.50,
            'menu' => 3
        ] );

        $margarita = Opciones::create( [
            'nombre' => 'Caipirina' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'caipirina.jpg',
            'costo' => 3.50,
            'menu' => 3
        ] );

        $tequilaSunrise = Opciones::create( [
            'nombre' => 'Tequila Sunrise' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'tequilasunrise.jpg',
            'costo' => 3.99,
            'menu' => 3
        ] );

        $jagerbomb = Opciones::create( [
            'nombre' => 'Jaguerbomb' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'jagerbomb.jpg',
            'costo' => 4,
            'menu' => 3
        ] );

        $cubaLibre = Opciones::create( [
            'nombre' => 'Cuba Libre' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'cubalibre.jpg',
            'costo' => 3,
            'menu' => 3
        ] );

        $longIsland = Opciones::create( [
            'nombre' => 'Long Islan Iced Tea' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'longislandicedtea.jpg',
            'costo' => 4,
            'menu' => 3
        ] );

        $goodbye = Opciones::create( [
            'nombre' => 'Goodbye Motherfucker!' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'goodbyemotherfucker.jpg',
            'costo' => 5.99,
            'menu' => 3
        ] );

        $cafe = Opciones::create( [
            'nombre' => 'Cafe' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'cafe.jpg',
            'costo' => 1,
            'menu' => 4
        ] );

        $tecaliente = Opciones::create( [
            'nombre' => 'Te Caliente' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'tecaliente.jpg',
            'costo' => 1,
            'menu' => 4
        ] );

        $tequilaShot = Opciones::create( [
            'nombre' => 'Tequila Shot' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'tequilashot.jpg',
            'costo' => 2.99,
            'menu' => 5
        ] );

        $vodkaShot = Opciones::create( [
            'nombre' => 'Vodka Shot' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'vodkashot.jpg',
            'costo' => 2.99,
            'menu' => 5
        ] );

        $ronShot = Opciones::create( [
            'nombre' => 'Ron Shot' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'ronshot.jpg',
            'costo' => 2.99,
            'menu' => 5
        ] );

        $whiskiShot = Opciones::create( [
            'nombre' => 'Whiski Shot' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'whiskishot.jpg',
            'costo' => 5.99,
            'menu' => 5
        ] );

        $tequilaJoseCuervo = Opciones::create( [
            'nombre' => 'Tequila Jose Cuervo' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'tequilajosecuervo.jpg',
            'costo' => 35,
            'menu' => 6
        ] );

        $tequilaJarana = Opciones::create( [
            'nombre' => 'Tequila Jarana' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'tequilajarana.jpg',
            'costo' => 30,
            'menu' => 6
        ] );

        $vodkaAbsolut = Opciones::create( [
            'nombre' => 'Vodka Absolut' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'vodkaabsolut.jpg',
            'costo' => 35,
            'menu' => 6
        ] );

        $vodksBotran = Opciones::create( [
            'nombre' => 'Vodka Botran' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'vodkabotran.jpg',
            'costo' => 20,
            'menu' => 6
        ] );

        $vodkaZero = Opciones::create( [
            'nombre' => 'Vodka Zero' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'vodkazero.jpg',
            'costo' => 20,
            'menu' => 6
        ] );

        $vodkaFinlandia = Opciones::create( [
            'nombre' => 'Vodka Finlandia' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'vodkafinlandia.jpg',
            'costo' => 30,
            'menu' => 6
        ] );

        $ronBotran = Opciones::create( [
            'nombre' => 'Ron Botran' ,
            'extra' => '8 anos' ,
            'descripcion' => 'Vacio',
            'imagen' => 'ronbotran8.jpg',
            'costo' => 20,
            'menu' => 6
        ] );

        $ronFlorDeCana = Opciones::create( [
            'nombre' => 'Ron Flor de Cana' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'ronflordecana.jpg',
            'costo' => 10,
            'menu' => 6
        ] );

        $vodkaZero = Opciones::create( [
            'nombre' => 'Vodka Zero' ,
            'extra' => '' ,
            'descripcion' => 'Vacio',
            'imagen' => 'vodkazero.jpg',
            'costo' => 20,
            'menu' => 6
        ] );

        $papasBravas = Opciones::create( [
            'nombre' => 'Papas Bravas' ,
            'extra' => '' ,
            'descripcion' => 'Papas preparadas con adabo picante acompanado de aderezo ranch.',
            'imagen' => 'papasbravas.jpg',
            'costo' => 2.75,
            'menu' => 7
        ] );

        $ultimaNota = Opciones::create( [
            'nombre' => 'Ultima Nota' ,
            'extra' => '' ,
            'descripcion' => '8 onz. de carne de res en cubo, pechuga de pollo en cubo, 2 chorizos, papas fritas, tortilla, ensalada, y ketchup.',
            'imagen' => 'ultimanota.jpg',
            'costo' => 14.99,
            'menu' => 7
        ] );

        $seisBocasMixtas = Opciones::create( [
            'nombre' => '6 Bocas Mixtas' ,
            'extra' => '' ,
            'descripcion' => 'Orden de 2 costillas, 2 alitas, y 2 chorizos acompanado de tortilla frita.',
            'imagen' => '6bocasmixtas.jpg',
            'costo' => 6.50,
            'menu' => 7
        ] );

        $mediaUltimaNota = Opciones::create( [
            'nombre' => '1/2 Ultima Nota' ,
            'extra' => '' ,
            'descripcion' => '4 onz. de carne de res en cubo, 1/2 pechuga de pollo en cubo, 1 chorizo, papas fritas, tortilla, ensalada, y ketchup.',
            'imagen' => 'mediaultimanota.jpg',
            'costo' => 8.50,
            'menu' => 7
        ] );

        $tacosDePollo = Opciones::create( [
            'nombre' => 'Tacos de Pollo' ,
            'extra' => '' ,
            'descripcion' => 'Orden de tacos de pollo acompanado de salsa de tomate.',
            'imagen' => 'tacosdepollo.jpg',
            'costo' => 4,
            'menu' => 7
        ] );

        $solfaBbq = Opciones::create( [
            'nombre' => 'Solfa BBQ' ,
            'extra' => '' ,
            'descripcion' => '2 alitas y 2 costillas de cerdo en barbacoa acompanado de pan con ajo.',
            'imagen' => 'solfabbq.jpg',
            'costo' => 5.50,
            'menu' => 7
        ] );

        $doceBocasMixtas = Opciones::create( [
            'nombre' => '12 Bocas Mixtas' ,
            'extra' => '' ,
            'descripcion' => 'Orden de 4 costillas, 4 alitas, y 4 chorizos acompanada de tortilla frita.',
            'imagen' => 'doceBocasMixtas.jpg',
            'costo' => 12.50,
            'menu' => 7
        ] );

        $pechugaAlaPlancha = Opciones::create( [
            'nombre' => 'Pechuga a la Plancha' ,
            'extra' => 'acompanado de arroz, ensalada, y tortilla.' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'pechugaalaplancha.jpg',
            'costo' => 5.99,
            'menu' => 8
        ] );

        $churrasco = Opciones::create( [
            'nombre' => 'Churrasco' ,
            'extra' => 'acompanado de arroz, chirmol, aguacate, chorizo y tortilla.' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'churrasco.jpg',
            'costo' => 8,
            'menu' => 8
        ] );

        $carneAsada = Opciones::create( [
            'nombre' => 'Carne Asada' ,
            'extra' => 'acompanado de arroz, chirmol, y tortilla' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'carneasada.jpg',
            'costo' => 7,
            'menu' => 8
        ] );

        $fileteDeResEnSalsaJalapena = Opciones::create( [
            'nombre' => 'Filete de Res en Salsa Jalapena' ,
            'extra' => 'acompanado de arroz, ensalada, y tortilla' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'filetederesensalsajalapena.jpg',
            'costo' => 8,
            'menu' => 8
        ] );

        $pechugaEnSalsaBarbacia = Opciones::create( [
            'nombre' => 'Pechuga en Salsa Barbacoa' ,
            'extra' => 'acompanado de arroz, ensalada, y tortilla' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'pechugaensalsabarbacoa.jpg',
            'costo' => 6.99,
            'menu' => 8
        ] );

        $costillaEnSalsaBarbacoa = Opciones::create( [
            'nombre' => 'Costilla En Salsa Barbacia' ,
            'extra' => 'acompanado de papas fritas y ketchup.' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'costillaensalsabarbacoa.jpg',
            'costo' => 6.99,
            'menu' => 8
        ] );

        $costillaDeCerdo = Opciones::create( [
            'nombre' => 'Costilla de Cerdo' ,
            'extra' => '' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'costilladecerdo.jpg',
            'costo' => 1.50,
            'menu' => 8
        ] );

        $alitaFrita = Opciones::create( [
            'nombre' => 'Alita Frita' ,
            'extra' => '' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'alitafrita.jpg',
            'costo' => 1,
            'menu' => 8
        ] );

        $chorizo = Opciones::create( [
            'nombre' => 'Chorizo' ,
            'extra' => '' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'chorizo.jpg',
            'costo' => 1.25,
            'menu' => 8
        ] );

        $alitaFrita = Opciones::create( [
            'nombre' => 'Aros de Cebolla' ,
            'extra' => '' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'arosdecebolla.jpg',
            'costo' => 2,
            'menu' => 8
        ] );

        $arosDeCebolla = Opciones::create( [
            'nombre' => 'Aros de Cebolla' ,
            'extra' => '' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'arosdecebolla.jpg',
            'costo' => 2,
            'menu' => 8
        ] );

        $nachos = Opciones::create( [
            'nombre' => 'Nachos' ,
            'extra' => '' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'nachos.jpg',
            'costo' => 2,
            'menu' => 8
        ] );

        $papasFritas = Opciones::create( [
            'nombre' => 'Papas Fritas' ,
            'extra' => '' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'papasfritas.jpg',
            'costo' => 1.75,
            'menu' => 8
        ] );

        $camaronEmpanizado = Opciones::create( [
            'nombre' => 'Camaron Empanizado' ,
            'extra' => '' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'camaronempanizado.jpg',
            'costo' => 2.50,
            'menu' => 8
        ] );

        $panConAjo = Opciones::create( [
            'nombre' => 'Pan con Ajo' ,
            'extra' => '' ,
            'descripcion' => 'Vacio.',
            'imagen' => 'panconajo.jpg',
            'costo' => 2.50,
            'menu' => 8
        ] );

        $claveDeFa = Opciones::create( [
            'nombre' => 'Clave de Fa' ,
            'extra' => '' ,
            'descripcion' => 'Panini preparado con fajitas de res, cebolla, pimiento verde, acompanado de papas fritas.',
            'imagen' => 'clavedefa.jpg',
            'costo' => 5.50,
            'menu' => 9
        ] );

        $corchea = Opciones::create( [
            'nombre' => 'Corchea' ,
            'extra' => '' ,
            'descripcion' => 'Panini preparado con frijoles, queso, aguacate, fajitas de res, fajitas de pollo, chorizo, acompanado de papas fritas.',
            'imagen' => 'corchea.jpg',
            'costo' => 5.99,
            'menu' => 9
        ] );

        $claveDeDo = Opciones::create( [
            'nombre' => 'Clave de Do' ,
            'extra' => '' ,
            'descripcion' => 'Panini preparado con atun, lechuga, tomate, pepino, cebolla, acompanado de papas fritas.',
            'imagen' => 'clavededo.jpg',
            'costo' => 4.99,
            'menu' => 9
        ] );

        $claveDeSol = Opciones::create( [
            'nombre' => 'Clave de Sol' ,
            'extra' => '' ,
            'descripcion' => 'Panini preparado con tocino frito, lechuga, tomate, acompanado de papas fritas.',
            'imagen' => 'clavedesol.jpg',
            'costo' => 4.99,
            'menu' => 9
        ] );

        $clubSandwitch = Opciones::create( [
            'nombre' => 'Club Sandwitch' ,
            'extra' => '' ,
            'descripcion' => 'Sandwitch preparado con torta de huevo, pechuga de pollo, y jamon, acompanado de papas fritas.',
            'imagen' => 'clubsandwitch.jpg',
            'costo' => 4.99,
            'menu' => 9
        ] );

//----------------------------------------PREGUNTAS
        $pregunta1 = Preguntas::create( [
            'pregunta' => 'Como llego a Acordes?' ,
            'respuesta' => 'Si sabes como llegar al paseo el carmen, solo debes caminar hasta encontrar la plaza de la cultura.'
        ] );

//-----------------------------------------PROMOCIONES

//-----------------------------------------REDES

//-----------------------------------------SERVICIOS
        $banqueteria = Servicios::create( [
            'nombre' => 'Banqueteria' ,
            'descripcion' => 'Ofrecemos el servicio banqueteria para todos aquellos eventos donde necesites personal para servir comida, cocineros...',
            'imagen' => 'banqueteria.jpg',
            'estado' => 1
        ] );

    }

}
