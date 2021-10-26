<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Modas Kelly
<p>
    Proyecto realizado para cumplir el ciclo básico de una tienda virtual, donde el client pueda ingresar, comprar un producto, pagar por el pedido, y ver el historial de peidos realizados, de igual forma el administrador de la tienda, podrá ver los pedidos registrados por todos los clientes, pudiendo gestionar el pago solo de los pedidos creados por el mismo.
</p>

## Disposición técnica
<ul>
    <li>Laravel 8</li>
    <li>Blade</li>
    <li>Tailwind css</li>
    <li>Postgresql</li>
    <li>Git flow</li>
</ul>

## Instalación
<ul>
    <li>Clonar proyecto o descargar como zip</li>
    <li>Crear archivo .env tomando como base .env.example</li>
    <li>Configurar credenciales de BD en archivo .env</li>
    <li>Desde la linea de comandos:
        <ul>
            <li>composer install</li>
            <li>npm install && npm run dev</li>
            <li>php artisan key:generate</li>
            <li>php artisan migrate --seed</li>
        </ul>
     </li>
</ul>

## Configuración placetopay
    Configurar estas variables de entorno en el archivo .env
        
    PLACETOPAY_LOGIN=// Provided by PlacetoPay
    PLACETOPAY_SECRET_KEY=// Provided by PlacetoPay
    PLACETOPAY_BASE_ENDPOINT="https:// Provided by PlacetoPay
    
    Ejecutar en linea de comandos:
    php artisan config:cache

## Credenciales de acceso

    Usuario Administrador:
    email: admin@modaskelly.com.co
    clave: 87654321

    Usuario Cliente:
    Puede registrarse libremente desde la página principal.

## Características principales puestas en práctica
<ul>
    <li>
        Metodología git flow, para control de versiones.
    </li>
    <li>
        Variables de entorno, para conexion a BD y a placetopay.
    </li>
    <li>
        Traits, para manejo de consecutivos, parametrizables en longitud y prefijo; y para gestionar conexión placetopay
    </li>
    <li>
        Relaciones polimorficas de eloquent, para usar un mismo modelo y entidad en el manejo de consecutivos a cualquer otro modelo.
    </li>
    <li>
        Observers, para actualizar consecutivos y mantener los datos del cliente actualizados y asi facilitar las futuras compras.
    </li>
</ul>
