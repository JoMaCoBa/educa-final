@extends('layouts.app')

@section('title', 'Todos los cursos')

@section('content')
    <div class="container flex justify-center items-center h-auto">
        <div class="w-full max-w-4xl">
            @if (isset($data))
                @php
                    $espanol = $data['Español'];
                    $matematicas = $data['Matemáticas'];
                    $tecnologia = $data['Tecnología'];
                    $ciencias = $data['Ciencias'];
                    $idiomas = $data['Inglés'];
                    $arte = $data['Arte'];
                    $emprendimiento = $data['Emprendimiento'];

                    // Ordena el array $data de menor a mayor
                    asort($data);

                    // Obtén el valor más bajo
                    $minValue = reset($data);

                    // Filtra el array para obtener las claves (materias) que tienen el valor más bajo
                    $minKeys = array_keys($data, $minValue);
                @endphp

               <!-- Modal -->
                <div id="modalEvaluacion" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" style="display: none;">
                    <div class="bg-white rounded-md p-6 max-w-lg w-full max-h-[80vh] overflow-y-auto">
                        <h2 class="text-lg font-bold" style="color: #00509a">Mi recomendación</h2>
                        <p>
                            @if ($minValue<80)
                                Okay, puedo ver que en el área donde más dificultad de aprendizaje tienes es en:



                                @foreach ($minKeys as $materia)
                                    {{ $materia }}
                                    @if (!$loop->last), @endif
                                @endforeach
                                . Aquí te dejo mis recomendaciones para mejorar tu aprendizaje :)

                            @endif

                            @if($minValue>=80)
                                Okay, puedo ver que tienes buenos conocimientos, pero aun asi te recomiendo los siguentes cursos para mejorar aun mas! :)
                            @endif
                        </p>
                        <div class="flex flex-wrap justify-center mb-8">
                            @foreach ($categories as $categoria)
                                @if (in_array($categoria->name, $minKeys))
                                    <div class="flex flex-row gap-4">
                                        @php
                                            $courses = $categoria->courses->sortByDesc('likes')->take(1);
                                        @endphp
                                        @foreach ($courses as $course)
                                            <div class="bg-white shadow-md rounded-md p-4 flex-1 min-w-[200px]">
                                                <img src="{{ asset($course->image_url) }}" alt="{{ $course->name }}" class="w-full h-32 object-cover mb-4">
                                                <h3 class="text-lg font-semibold mb-2">{{ $course->name }}</h3>
                                                <p class="text-sm text-gray-600">{{ $course->description }}</p>
                                                <a href="{{ route('course.index', $course->slug) }}" class="block mt-4 text-blue-500 hover:text-blue-700">Ver más</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="equisModal" class="mt-4 text-red-500">Cerrar</button>
                    </div>
                    <img src="{{ asset('images/bot.png') }}" alt="Bot" height="200">
                </div>

            @endif


            <h1 class="text-3xl font-bold text-center mb-8 mt-5">Todos los cursos</h1>
            @foreach ($categories as $category)
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4">{{ $category->name }}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($category->courses as $course)
                            <div class="bg-white shadow-md rounded-md p-4">
                                <img src="{{ asset($course->image_url) }}" alt="{{ $course->name }}" class="w-full h-32 object-cover mb-4">
                                <h3 class="text-lg font-semibold mb-2">{{ $course->name }}</h3>
                                <p class="text-sm text-gray-600">{{ Str::substr($course->description, 0, 70) }}...</p>
                                <a href="{{ route('course.index', $course->slug) }}" class="block mt-4 text-blue-500 hover:text-blue-700">Ver más</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Abre la ventana emergente automáticamente
            const modalElement = document.getElementById('modalEvaluacion');
            modalElement.style.display = 'flex'; // Cambia a 'flex' para mostrar la ventana
        });

        // Función para cerrar el modal
        function cerrarModal() {
            document.getElementById("modalEvaluacion").style.display = "none";
        }

        // Evento para cerrar el modal al hacer clic en el tache
        document.getElementById("equisModal").addEventListener('click', function() {
            cerrarModal();
        });
    </script>
@endsection
