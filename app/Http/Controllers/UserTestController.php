<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SectionOneUserTest;
use App\SectionTwoUserTest;
use App\SectionThreeUserTest;

class UserTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sectionOne = SectionOneUserTest::create([
            'user_id' => $request->user_id,
            'evaluation' => number_format($request->evaluation,1),
            'time' => $request->time
        ]);
        for($i = 1; $i <= 30; $i++){
            $sectionOne['question_'.$i] = $request->resp_one[$i - 1]['respuesta'];
        }
        $sectionOne->save();

        $sectionTwo = SectionTwoUserTest::create([
            'user_id' => $request->user_id,
        ]);
        for($i = 1; $i <= 19; $i++){
            $sectionTwo['question_'.$i] = $request->resp_two[$i - 1]['respuesta'];
        }
        $sectionTwo->save();

        $sectionThree = SectionThreeUserTest::create([
            'user_id' => $request->user_id,
        ]);
        for($i = 1; $i <= 18; $i++){
            $sectionThree['question_'.$i] = $request->resp_three[$i - 1]['respuesta'];
        }
        $sectionThree->save();

        return ['evaluation' => $sectionOne->evaluation];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkUserTest(Request $request,$id)
    {
        $oneTest = SectionOneUserTest::where('user_id',$id)->orderBy('id','desc')->first();
        if($oneTest)
        {
            return ['error' => 0];
        }else{
            return ['error' => 1];
        }
    }

    public function generateUserTest(Request $request,$id)
    {
        $oneTest = SectionOneUserTest::where('user_id',$id)->orderBy('id','desc')->first();
        $twoTest = SectionTwoUserTest::where('user_id',$id)->orderBy('id','desc')->first();
        $threeTest = SectionThreeUserTest::where('user_id',$id)->orderBy('id','desc')->first();
        $logo = parseBase64(public_path("img/dotech_fondo.png"));
        $oneQuestion = [
            '01.- Una hoja de c??lculo es:',
            '02.-En una hoja de calculo, la f??rmula =suma(C5;C10) obtiene:',
            '03.-Una diapositiva es:',
            '04.-??Qu?? nos permite saber la funci??n ABS de Excel?',
            '05.-??Cu??l es la extensi??n de los archivos de Access?',
            '06.-??En qu?? progama nos encontramos con funciones de tipo l??gico?',
            '07.-??Qu?? programa se emplea para hacer presentaciones?',
            '08.-??Qu?? signo es escencial en Excel?',
            '09.-Ejemplo de navegador de Web es:',
            '10.-Cuando el mouse cambia y es una mano se??alando significa:',
            '11.-Usted tiene una computadora en reparaci??n, la falla descrita por el cliente es : No enciende. Revisa la PC y nota que al encenderla ning??n ventilador gira, no se enciende ninguna luz, y tampoco se escucha sonido alguno. ??En donde se encuentra la posible falla?',
            '12.-Se recibe un reclamo de un cliente porque su impresora nueva, comprada hace 2 meses no imprime correctamente. Usted realiza una hoja de prueba y nota que el color negro no esta imprimiendo como deberia. Revisa los niveles de tinta y estos estan casi lleno',
            '13.-??Qu?? es un hacker?',
            '14.-La RAM es:',
            '15.-La computaci??n en la nube se le dice a:',
            '16.-??Qu?? es Hardware ?',
            '17.-??Cu??les de estas son unidades de medidas en inform??tica ?',
            '18.-??Qu?? es un backup ?',
            '19.-??Cu??les de estos son programas de OFFICE ?',
            '20.-??Cu??les de estos son versiones de Sistemas Operativos de WINDOWS ?',
            '21.-??Cu??les son las teclas de atajo usadas en este mismo orden para: Cortar, Copiar y Pegar ?',
            '22.-??Qu?? es una UPS ?',
            '23.-??Cual crees que es la se??al principal de que un disco duro se est?? deteriorando?',
            '24.-Tres valores que debe estar configurado para permitir que un PC para conectarse con una red?',
            '25.-??Qu?? comando, disponible en Windows se mostrar?? la informaci??n de configuraci??n de red de un PC?',
            '26.-??El m??todo a utilizar para poner fin a un proceso de forma manual en Windows XP?',
            '27.-??Opci??n del men?? de inicio que permite el acceso a la l??nea de comando de entrada del espacio?',
            '28.-??Que utilidad de Windows se utiliza para instalar manualmente un controlador de dispositivos?',
            '29.-A un t??cnico de una empresa, se le ha pedido a la reparaci??n de un PC. ??Cu??l es la primera tarea que el t??cnico debe llevar a cabo para solucionar problemas de la computadora?',
            '30.-??Cual es el modo de inicio que permite el acceso a Windows con s??lo los controladores de dispositivos m??s b??sicos?'
        ];
        $twoQuestion = [
            'Al intentar arrancar un equipo no enciende.',
            'El mismo equipo enciende pero no da video.',
            'El equipo enciende y se escuchan varios pitidos.',
            'Al encender el equipo marca un error de boot o boot.ini.',
            '??Con qu?? tecla invocas el men?? de inicio para iniciar en modo aprueba de fallos?.',
            '??Normalmente con qu?? tipo de falla asocias los ???Blue Screens???(pantallas azules) en Windows?.',
            'Al firmarse en Windows el tiempo de carga es demasiado lento.',
            'Si tuvieses que formatear el equipo. ??Qu?? procedimiento utilizar??as para respaldar el equipo y dejarlo EXACTAMENTE igual?.',
            '??C??mo respaldar??as los drivers y que informaci??n del usuario respaldar??as?.',
            'Al firmarse en Windows carga demasiados programas residentes. ??Qu?? comando utilizas para modificar los programas que se cargan al inicio?.',
            '??Qu?? comando utilizas para salir al prompt?.',
            '??En qu?? casos recomiendas el uso de Scandisk y Defrag?.',
            '??Qu?? extensi??n tienen los archivos de datos de Microsoft Outlook?.',
            '??Qu?? extensi??n tienen los archivos de datos de Outlook Express?.',
            '??Qu?? es un normal.dot?',
            'Describe un problema de spool32 y una posible soluci??n.',
            '??Qu?? es un archivo con extensi??n .csv?.',
            '??En qu?? modos puedes configurar un disco duro o cd rom?.',
            'Tenemos un equipo PIV 3.06 GHz con 512 Mb en RAM el usuario se queja de lentitud del sistema a pesar de que le has hecho un mantenimiento preventivo y problemas de software no tiene el equipo. ??Cual ser??a tu recomendaci??n?.',
        ];
        $threeQuestion = [
            '??Qu?? tipo de cable se ocupa para cablear nodos de datos Cat 5e?.',
            'Indica el orden de los colores para rematar un cable de datos, puedes utilizar el standard A o B seg??n lo desees.',
            'Indica el orden de colores para un cable ???crossover ??? (cruzado).',
            '??Para qu?? se ocupa un patch panel?.',
            'Seg??n el standard. ??Cu??l es la longitud m??xima que un cable de red puede tener?.',
            '??Es posible que viajen juntos un cable de datos y un cable de corriente?. Si o no y ??Por qu???.',
            '??En qu?? tipos de redes se ocupa la seguridad WEP?.',
            '??Qu?? comando puedes utilizar para saber si un equipo est?? conectado a la red?.',
            '??Qu?? es un DHCP?.',
            '??Qu?? es un DNS?.',
            '??Qu?? es un Router?.',
            '??Qu?? hace un switch?.',
            '??Qu?? es un FTP?.',
            '??Con qu?? comando puedes saber la ip de una maquina?.',
            '??Con qu?? comando puedes verificar si otro equipo esta en red?.',
            'De acuerdo a la siguiente configuraci??n de red contesta las siguientes preguntas:',
            '??Es posible compartir una impresora por medio de una red?',
            '??Y un disco duro?',
        ];
        $pdf = \PDF::loadView('pdf.test',
            [
                'logo' => $logo,
                'oneTest' => $oneTest,
                'oneQuestion' => $oneQuestion,
                'twoTest' => $twoTest,
                'twoQuestion' => $twoQuestion,
                'threeTest' => $threeTest,
                'threeQuestion' => $threeQuestion,
            ]
        );
        return $pdf->stream('Test_'.$oneTest->user['name'].'_'.$oneTest->user['middle'].' .pdf');
    }
}
