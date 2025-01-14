<?php

use App\Http\Middleware\RequireAuthenticated;
use App\Http\Middleware\RequireUnauthenticated;
use App\Livewire\Authentication\Form\Login;
use App\Livewire\Business\Client\Main as ClientMain;
use App\Livewire\Business\DeliveryCost\Main as DeliveryCostMain;
use App\Livewire\Home\Form\CheckOrder;
use App\Livewire\Home\Main as HomeMain;
use App\Livewire\Lookup\DestinationArea\Main as DestinationAreaMain;
use App\Livewire\Lookup\Role\Main as RoleMain;
use App\Livewire\Lookup\VehicleType\Main as VehicleTypeMain;
use App\Livewire\Order\Detail;
use App\Livewire\Order\Form\AddClient;
use App\Livewire\Order\Main as OrderMain;
use App\Livewire\Order\Print\AssignmentLetter;
use App\Livewire\Order\Print\OrderReceipt;
use App\Livewire\Resource\Driver\Main;
use App\Livewire\Resource\Employee\Main as EmployeeMain;
use App\Livewire\Resource\Vehicle\Main as VehicleMain;
use App\Models\Client;
use App\Models\DeliveryCost;
use App\Models\DestinationArea;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Role;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Support\Facades\Route;

Route::name('home')->get('/', HomeMain::class);
Route::name('home.check-order')->get('/order/check', CheckOrder::class);

Route::middleware(RequireAuthenticated::class)->group(function () {

    Route::name('order')
        ->get('/order', OrderMain::class)
        ->can('viewAny', Order::class);
    Route::name('order.detail')
        ->get('/order/detail/{order}', Detail::class)
        ->can('view', 'order');
    Route::name('order.request')
        ->get('/order/request', AddClient::class)
        ->can('create', Order::class);
    Route::name('order.print-assignment-letter')
        ->get('/order/assignment-letter/{order:id}', AssignmentLetter::class)
        ->can('viewAny', Order::class);

    Route::name('business.')->prefix('/business')->group(function () {

        Route::name('client')
            ->get('/client', ClientMain::class)
            ->can('viewAny', Client::class);
        Route::name('client.print-order-receipt')
            ->get('/client/order-receipt/{client:id}', OrderReceipt::class)
            ->can('viewAny', Client::class);

        Route::name('delivery-cost')
            ->get('/delivery-cost', DeliveryCostMain::class)
            ->can('viewAny', DeliveryCost::class);
    });

    Route::name('resource.')->prefix('/resource')->group(function () {

        Route::name('driver')
            ->get('/driver', Main::class)
            ->can('viewAny', Driver::class);

        Route::name('vehicle')
            ->get('/vehicle', VehicleMain::class)
            ->can('viewAny', Vehicle::class);

        Route::name('employee')
            ->get('/employee', EmployeeMain::class)
            ->can('viewAny', Employee::class);
    });

    Route::name('lookup.')->prefix('/lookup')->group(function () {

        Route::name('destination-area')
            ->get('/destination-area', DestinationAreaMain::class)
            ->can('viewAny', DestinationArea::class);

        Route::name('vehicle-type')
            ->get('/vehicle-type', VehicleTypeMain::class)
            ->can('viewAny', VehicleType::class);

        Route::name('role')
            ->get('/role', RoleMain::class)
            ->can('viewAny', Role::class);
    });
});

Route::middleware(RequireUnauthenticated::class)->group(function () {

    Route::name('authentication.')->group(function () {

        Route::name('login')
            ->get('/login', Login::class);
    });
});
