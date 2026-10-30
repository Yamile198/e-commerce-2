@extends('layouts.app')

@section('title', 'Gracias por tu pedido | Sabores en Casa')

@section('content')
    <div class="ul-breadcrumb">
        <div class="wow animate__fadeInUp">
            <h2 class="ul-breadcrumb-title">¡Gracias por tu pedido!</h2>
        </div>
    </div>

    <div class="ul-container ul-section-spacing text-center">
        <p>Estamos confirmando tu pago. En unos minutos recibirás un correo con los detalles de tu pedido.</p>
        <a href="{{ route('shop') }}" class="ul-btn mt-4">Seguir comprando <i class="flaticon-right"></i></a>
    </div>
@endsection

@push('scripts')
<script>
    // Vacía el carrito solo si Mercado Pago regresó con el pago aprobado.
    if (new URLSearchParams(location.search).get('status') === 'approved') {
        localStorage.removeItem('cart'); // misma llave que CART_KEY en checkout.js
    }
</script>
@endpush
