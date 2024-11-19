@extends('layouts.app')

@section('title', 'EduCA')

@section('content')

<div class="container mx-auto px-4 py-8 h-auto lg:h-full grid place-items-center">
    <h1 class="text-4xl font-bold mb-4 text-center">Bienvenido a Edu<span class="text-primary">CA</span></h1>
    <p class="text-lg text-gray-700 mb-8">EduCA es una innovadora plataforma educativa diseñada para programadores, estudiantes de primaria, universitarios ofreciendo una amplia gama de recursos que incluyen videos. Nuestro compromiso es proporcionar un ambiente de aprendizaje enriquecedor. Buscamos llevar conocimientos a todas aquellas personas que quieran ampliar sus habilidades.</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-6 rounded-lg shadow-lg transition-all transform hover:-translate-y-4 hover:shadow-xl">
            <h2 class="text-xl font-bold mb-2 text-center"><span class="text-primary">Módulo 1:</span> Proyecto y Gestión de Tecnología de la Información</h2>
            <p class="text-gray-700 text-justify pt-3">En este módulo, abordamos la arquitectura y programación de sistemas utilizando PHP con el framework Laravel. Además, implementamos una base de datos y seguimos las mejores prácticas de ingeniería de software para garantizar un desarrollo robusto y escalable.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg transition-all transform hover:-translate-y-4 hover:shadow-xl">
            <h2 class="text-xl font-bold mb-2 text-center"><span class="text-primary">Módulo 2:</span> Sistemas Robustos, Paralelos y Distribuidos</h2>
            <p class="text-gray-700 text-justify pt-3">En este módulo, abordamos los sistemas distribuidos. Nuestra plataforma está alojada en DOM Cloud, una plataforma de alojamiento en la nube que utiliza una arquitectura distribuida para garantizar la disponibilidad y el rendimiento del sistema. Esto nos permite ofrecer un servicio confiable y escalable para nuestros usuarios en todo momento.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg transition-all transform hover:-translate-y-4 hover:shadow-xl">
            <h2 class="text-xl font-bold mb-2 text-center"><span class="text-primary">Módulo 3:</span> Cómputo Flexible</h2>
            <p class="text-gray-700 text-justify pt-3">En este módulo, nos enfocamos en la implementación de sistemas inteligentes. Desarrollamos un sistema de recomendación basado en contenido que permite a los usuarios seleccionar categorías de interés al registrarse. Esto se basa en algoritmos de filtrado basado en contenido para generar recomendaciones personalizadas y enriquecer la experiencia de aprendizaje de nuestros usuarios.</p>
        </div>
    </div>
</div>

@endsection
