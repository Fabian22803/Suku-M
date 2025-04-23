@extends('layout.app')

@section('content')
<!-- Contenido principal de la sección -->
<div class="container mt-4">
    <!-- Imagen tipo banner -->
<!-- Imagen tipo banner -->
<div class="plantas-hero">
    <div class="hero-section overlay">
        <img src="{{ asset('/image/imagen.jpg') }}" alt="Banner de Plantas" class="img-fluid w-100">
        <h1 class="fw-bold"></public/image/imagen.jpgh1>
    </div>
</div>

</div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        </ol>
    </nav>
    

    <!-- Título principal -->
    <h1 class="fw-bold">Plantas medicinales de Caldono Cauca</h1>

    <!-- Descripción -->
    <p class="lead">
        Caldono, un municipio ubicado en el norte del departamento del Cauca, Colombia, es una región rica en biodiversidad y saberes ancestrales. En este territorio, las plantas medicinales juegan un papel fundamental dentro de la cultura de las comunidades indígenas, campesinas y afrodescendientes.

        Gracias a su ubicación geográfica, Caldono cuenta con una gran variedad de especies nativas utilizadas tradicionalmente para tratar dolencias comunes como gripes, dolores musculares, problemas digestivos y enfermedades de la piel. Plantas como el matico, la ruda, el sauco, la altamisa y el boldo son solo algunas de las más empleadas.
        
        Estos saberes, transmitidos de generación en generación, no solo reflejan una conexión profunda con la naturaleza, sino también una forma de resistencia cultural y cuidado comunitario. Además, muchas familias caldoneñas siguen utilizando estas plantas como una alternativa accesible, natural y efectiva frente a la medicina convencional.
        
        
    </p>


  
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Plantas</h5>
        <p class="card-text">Explora más sobre las plantas medicinales de Caldono Cauca.</p>
        {{-- <a href="{{ route('plantas.index') }}" class="btn btn-primary">Ver más</a> --}}
    </div>
</div>

</div>

@endsection