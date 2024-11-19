@extends('layouts.app')

@section('title', 'EduCA - Inicio')

@section('content')

    <header id="home" class="relative overflow-hidden h-screen">
        <div class="absolute inset-0 flex items-center justify-center lg:justify-start">
            <div class="max-w-2xl text-center lg:text-left px-6 text-white">
                <p class="text-4xl lg:text-5xl font-semibold bg-primary rounded-2xl p-4">Encuentra el curso que deseas</p>
                <a href="{{route('courses.all')}}" class="Secondary-Button mt-8 flex justify-center">Explorar</a>
            </div>
        </div>
        {{-- {{ asset('images/header.jpg') }} --}}
        <img src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="inset-0 w-full h-full object-cover object-center z-0">
    </header>

    <main id="recommendations" class="p-6">

        <p class="text-3xl font-semibold text-primary ">Cursos que te recomendamos</p>

        <div
            class="w-auto h-72 items-center {{-- mt-6 --}} overflow-x-auto overscroll-x-contain flex space-x-6 overflow-y-hidden">

            @foreach ($courses as $course)
                @if ($course->id % 2 == 0)
                    <a href="{{ route('course.index', $course->slug) }}" class="Card">
                        <img src="{{ asset($course->image_url) }}" class="w-full h-3/5 object-cover object-center">
                        <div class="w-full h-2/5 bg-secondary px-4 py-2">
                            <p class="text-white font-bold text-xl">{{ $course->name }}</p>
                            <p class="text-white text-md">{{ $course->description }}</p>
                        </div>
                    </a>
                @else
                    <a href="{{ route('course.index', $course->slug) }}" class="Card">
                        <img src="{{ asset($course->image_url) }}" class="w-full h-3/5 object-cover object-center">
                        <div class="w-full h-2/5 bg-white px-4 py-2">
                            <p class="text-terciary font-bold text-xl">{{ $course->name }}</p>
                            <p class="text-terciary text-md">{{ $course->description }}</p>
                        </div>
                    </a>
                @endif
            @endforeach

        </div>

    </main>

    <div>  <!-- chatboot -->
        <!-- Abrir el boot -->
        <div id="bot-emergente" >

            <div style="display: flex; justify-content:right"> <!-- Bot -->

                <a  href="javascript:evaluarProfesor()">
                    <img src="images/Bot 2.png" alt="Bot" class="w-56 h-auto">
                </a>

            </div>

            <!-- Modal para boot -->
            <div class="bot" id="modalEvaluacion">
                <form action="{{  route( "courses.all2")}}" method="POST">
                    @csrf
                    <h2 style="font-weight:bold; color:#00509a">
                        ¡Hola soy Watson y te ayudare a encontrar <br> los mejores cursos para ti!
                    </h2>
                    <i class="fas fa-times" id="equisModal"></i>

                    <div>
                        <p>Solo necesito que me des el porcentaje de conocimientos que tienes en las siguientes asignaturas</p><br>

                        <div class="range-group">
                            <label for="Español">Español</label>
                            <input id="Español" type="range" list="calificacionesPosibles" step="5" oninput="dificultad(this.value, 'evaluacionEspañol')" name="Español">
                            <span id="evaluacionEspañol">50</span>
                        </div>

                        <div class="range-group">
                            <label for="Matemáticas">Matemáticas</label>
                            <input id="Matemáticas" type="range" list="calificacionesPosibles" step="5" oninput="dificultad(this.value, 'evaluacionMatematicas')" name="Matemáticas">
                            <span id="evaluacionMatematicas">50</span>
                        </div>

                        <div class="range-group">
                            <label for="tecnologia">Tecnología</label>
                            <input id="tecnologia" type="range" list="calificacionesPosibles" step="5" oninput="dificultad(this.value, 'evaluacionTecnologia')" name="Tecnología">
                            <span id="evaluacionTecnologia">50</span>
                        </div>

                        <div class="range-group">
                            <label for="ciencias">Ciencias</label>
                            <input id="ciencias" type="range" list="calificacionesPosibles" step="5" oninput="dificultad(this.value, 'evaluacionCiencias')" name="Ciencias">
                            <span id="evaluacionCiencias">50</span>
                        </div>

                        <div class="range-group">
                            <label for="idiomas">Inglés</label>
                            <input id="idiomas" type="range" list="calificacionesPosibles" step="5" oninput="dificultad(this.value, 'evaluacionIdiomas')" name="Inglés">
                            <span id="evaluacionIdiomas">50</span>
                        </div>

                        <div class="range-group">
                            <label for="arte">Arte</label>
                            <input id="arte" type="range" list="calificacionesPosibles" step="5" oninput="dificultad(this.value, 'evaluacionArte')" name="Arte">
                            <span id="evaluacionArte">50</span>
                        </div>

                        <div class="range-group">
                            <label for="Emprendimiento">Emprendimiento</label>
                            <input id="Emprendimiento" type="range" list="calificacionesPosibles" step="5" oninput="dificultad(this.value, 'evaluacionEmprendimiento')" name="Emprendimiento">
                            <span id="evaluacionEmprendimiento">50</span>
                        </div>

                    </div>

                    <button class="btn-boot" name="Listo">Listo</button>

                    <datalist id="calificacionesPosibles">
                        <option value="0" label="0%">
                        <option value="5">
                        <option value="10">
                        <option value="15">
                        <option value="20">
                        <option value="25">
                        <option value="30">
                        <option value="35">
                        <option value="40">
                        <option value="45">
                        <option value="50" label="50%">
                        <option value="55">
                        <option value="60">
                        <option value="65">
                        <option value="70">
                        <option value="75">
                        <option value="80">
                        <option value="85">
                        <option value="90">
                        <option value="95">
                        <option value="100" label="100%">
                    </datalist>
                </form>
                <img src="{{ asset('images/bot.png') }}" alt="Bot" height="200">
            </div>

    </div>

    <section id="featured" class="px-3 h-auto w-full">
        <p class="text-3xl text-primary font-semibold mt-6 mb-6">Cursos Destacados</p>
        <div class="w-full h-full grid grid-cols-1 lg:grid-cols-2 lg:place-items-center gap-4 lg:place-content-stretch">
            @foreach ($featuredCourses as $key => $course)
                @if ($key == 0)
                    <a href="{{ route('course.index', $course->slug) }}" class="w-full h-96 rounded-xl overflow-hidden inline-block relative lg:col-span-2 transition-all transform hover:-translate-y-4 hover:shadow-xl">
                        <img src="{{ asset($course->image_url) }}" class="w-full h-full object-cover relative">
                        <p class="Card-Secondary-Title absolute top-2 left-0 text-white pl-8">{{ $course->name }}</p>
                        <p class="text-md absolute bottom-60 left-0 text-white pl-8">{{ $course->description }}</p>
                    </a>
                @else
                    <a href="{{ route('course.index', $course->slug) }}" class="w-full h-96 rounded-xl overflow-hidden inline-block relative transition-all transform hover:-translate-y-4 hover:shadow-xl">
                        <img src="{{ asset($course->image_url) }}" class="w-full h-full object-cover relative">
                        <p class="Card-Secondary-Title absolute top-2 left-0 text-secondary pl-8">{{ $course->name }}</p>
                        <p class="text-md absolute bottom-60 left-0 text-secondary pl-8 font-semibold">{{ $course->description }}</p>
                    </a>
                @endif
            @endforeach
        </div>
    </section>


    <script>  //Javascript para chatboot
        // Función para cerrar el modal
     function cerrarModal() {
         document.getElementById("modalEvaluacion").style.width = "0vw";
     }

     // Función para abrir el modal
     function evaluarProfesor() {
         document.getElementById("modalEvaluacion").style.width = "100vw";
     }

     // Función para cambiar el valor de la dificultad
     function dificultad(newVal, spanId) {
         document.getElementById(spanId).innerHTML = newVal;
     }

     // Evento para cerrar el modal al hacer clic en el tache
     document.getElementById("equisModal").addEventListener('click', function() {
         cerrarModal();
     });

     </script>



@endsection
