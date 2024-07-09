@extends('dashboard.masterDashboard')

@section('title')
    <title>CCA | Personas</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    
@endsection

@section('content')

    <div class="container mx-auto p-6">
        <!-- Ruta en la que se encuentra (BreadCrumb) -->
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/home" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"><svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/></svg>Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                        <a href="dashboard/personas" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Personas</a>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="text-2xl font-bold pt-4">Personas</h1>
        <p class="mb-3 text-gray-500 dark:text-gray-400">En esta sección, usted puede visualizar, editar y eliminar a las personas registrados a nivel administrador u/o editor.</p>
        <button class="overflow-y-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-create-user" data-drawer-show="drawer-create-user" aria-controls="drawer-create-user">
            Agregar nueva persona
        </button>
        

        <br><br>

        <table id="example" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" style="width:100%">
            <thead class="text-xs text-white uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre(s)</th>
                    <th scope="col" class="px-6 py-3">Apellidos</th>
                    <th scope="col" class="px-6 py-3">Fecha Nacimiento</th>
                    <th scope="col" class="px-6 py-3">Categoría</th>
                    <th scope="col" class="px-6 py-3">Sexo</th>
                    <th scope="col" class="px-6 py-3">Estado Civil</th>
                    <th scope="col" class="px-6 py-3">Dirección</th>
                    <th scope="col" class="px-6 py-3">Número Teléfonico</th>
                    <th scope="col" class="px-6 py-3">Facebook</th>
                    <th scope="col" class="px-6 py-3">Correo Electronico</th>
                    <th scope="col" class="px-6 py-3">Medio Comunicación</th>
                    <th scope="col" class="px-6 py-3">Invitacion Personal</th>
                    <th scope="col" class="px-6 py-3">¿Te congregas en otra iglesia?</th>
                    <th scope="col" class="px-6 py-3">Recordatorios</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($persons as $person)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $person->name }}</th>
                        <td class="px-6 py-4">{{ $person->lastname }}</td>
                        <td class="px-6 py-4">{{ $person->birthdate }}</td>
                        <td class="px-6 py-4">
                            @if ($person->category == 1)
                                <span class="bg-blue-500 text-gray-100 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Señor</span>
                            @elseif ($person->category == 2)
                                <span class="bg-yellow-300 text-gray-100 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Señora</span>
                            @elseif ($person->category == 3)
                                <span class="bg-green-400 text-gray-100 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Jovén</span>
                            @elseif ($person->category == 4)
                                <span class="bg-red-500 text-gray-100 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Señorita</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($person->sex == 1)
                                <span class="bg-blue-500 text-gray-100 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Masculino</span>
                            @elseif ($person->sex == 2)
                            <span class="bg-green-400 text-gray-100 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Femenino</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($person->civil_status == 1)
                                Casado(a)
                            @elseif($person->civil_status == 2)
                                Divorciado(a)
                            @elseif($person->civil_status == 3)
                                Union Libre
                            @elseif($person->civil_status == 4)
                                Viudo(a)
                            @elseif($person->civil_status == 5)
                                Soltero(a)
                            @elseif($person->civil_status == 6)
                                Otro
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $person->address }}</td>
                        <td class="px-6 py-4"><a class="text-blue-600 hover:underline dark:text-blue-500" href="tel:{{ $person->phone_number }}">{{ $person->phone_number }}</a></td>
                        <td class="px-6 py-4">{{ $person->facebook }}</td>
                        <td class="px-6 py-4"><a class="text-blue-600 hover:underline dark:text-blue-500" href="mailto:{{ $person->email }}">{{ $person->email }}</a></td>
                        <td class="px-6 py-4">
                            @if ($person->media == 1)
                                Volante
                            @elseif($person->media == 2)
                                Facebook
                            @elseif($person->media == 3)
                                Radio
                            @elseif($person->media == 4)
                                Invitación Personal
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $person->personal_invitation }}</td>
                        <td class="px-6 py-4">
                            @if ($person->do_you_congregate == 1)
                                Si
                            @elseif($person->do_you_congregate == 2)
                                No                                        
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($person->reminders == 1)
                                Si
                            @elseif($person->reminders == 2)
                                No                                        
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="text-xs text-white uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre(s)</th>
                    <th scope="col" class="px-6 py-3">Apellidos</th>
                    <th scope="col" class="px-6 py-3">Fecha Nacimiento</th>
                    <th scope="col" class="px-6 py-3">Categoría</th>
                    <th scope="col" class="px-6 py-3">Sexo</th>
                    <th scope="col" class="px-6 py-3">Estado Civil</th>
                    <th scope="col" class="px-6 py-3">Dirección</th>
                    <th scope="col" class="px-6 py-3">Número Teléfonico</th>
                    <th scope="col" class="px-6 py-3">Facebook</th>
                    <th scope="col" class="px-6 py-3">Correo Electronico</th>
                    <th scope="col" class="px-6 py-3">Medio Comunicación</th>
                    <th scope="col" class="px-6 py-3">Invitacion Personal</th>
                    <th scope="col" class="px-6 py-3">¿Te congregas en otra iglesia?</th>
                    <th scope="col" class="px-6 py-3">Recordatorios</th>
                </tr>
            </tfoot>
        </table>

    </div>


    <!-- drawer component -->
    <div id="drawer-create-user" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-create-user-label">
        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
            <svg class="w-4 h-4 me-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
            </svg>
              
            Nueva persona
        </h5>

        <button type="button" data-drawer-hide="drawer-create-user" aria-controls="drawer-create-user" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>


        <form class="mb-6">
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre(s)</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="--Ingrese su nombre--" required>
            </div>
            <div class="mb-6">
                <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                <input type="text" name="lastname" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="--Ingrese su apellidos--" required>
            </div>
            
            <button type="submit" class="toverflow-y-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Registrar Persona
            </button>
            <br><br><br><br><br>
        </form>
    </div>
    
@endsection

@section('script-personales')
    <script>
        new DataTable('#example', {
            paging: false,
            scrollCollapse: true,
            scrollY: '50vh'
        });
    </script>
@endsection