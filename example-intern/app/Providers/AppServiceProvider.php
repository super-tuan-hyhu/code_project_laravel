<?php

namespace App\Providers;

use App\Repositories\address\AddressRepository;
use App\Repositories\address\AddressRepositoryInterface;
use App\Repositories\Brand\BandRepository;
use App\Repositories\Brand\BandRepositoryInterface;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\CartDetail\CartDetailRepository;
use App\Repositories\CartDetail\CartDetailRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Color\ColorRepository;
use App\Repositories\Color\ColorRepositoryInterface;
use App\Repositories\Coupon\CouponRepository;
use App\Repositories\Coupon\CouponRepositoryInterface;
use App\Repositories\District\DistrictRepository;
use App\Repositories\District\DistrictRepositoryInterface;
use App\Repositories\ImageColor\ImageColorRepository;
use App\Repositories\ImageColor\ImageColorRepositoryInterface;
use App\Repositories\order\OrderRepository;
use App\Repositories\order\OrderRepositoryInterface;
use App\Repositories\orderDetail\OrderDetailRepository;
use App\Repositories\orderDetail\OrderDetailRepositoryInterface;
use App\Repositories\Personnel\PersonnelRepository;
use App\Repositories\Personnel\PersonnelRepositoryInterface;
use App\Repositories\Products\ProductRepository;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\returnOrder\ReturnOrderRepository;
use App\Repositories\returnOrder\ReturnOrderRepositoryInterface;
use App\Repositories\returnOrderDetail\ReturnOrderDetailRepository;
use App\Repositories\returnOrderDetail\ReturnOrderDetailRepositoryInterface;
use App\Repositories\Shipment\ShipmentRepository;
use App\Repositories\Shipment\ShipmentRepositoryInterface;
use App\Repositories\Size\SizeRepository;
use App\Repositories\Size\SizeRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Category
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class,
        );

        // Brand
        $this->app->singleton(
            BandRepositoryInterface::class,
            BandRepository::class,
        );

        // Products
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class,
        );

        // Color
        $this->app->singleton(
            ColorRepositoryInterface::class,
            ColorRepository::class,
        );

        // Size
        $this->app->singleton(
            SizeRepositoryInterface::class,
            SizeRepository::class,
        );

        // Image Color
        $this->app->singleton(
            ImageColorRepositoryInterface::class,
            ImageColorRepository::class,
        );

        // Coupon
        $this->app->singleton(
            CouponRepositoryInterface::class,
            CouponRepository::class,
        );

        // Personnel
        $this->app->singleton(
            PersonnelRepositoryInterface::class,
            PersonnelRepository::class,
        );

        // User
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        // Address
        $this->app->singleton(
            AddressRepositoryInterface::class,
            AddressRepository::class,
        );

        // District
        $this->app->singleton(
            DistrictRepositoryInterface::class,
            DistrictRepository::class,
        );

        // order
        $this->app->singleton(
            OrderRepositoryInterface::class,
            OrderRepository::class,
        );

        // orderDetail
        $this->app->singleton(
            OrderDetailRepositoryInterface::class,
            OrderDetailRepository::class,
        );

        // shipment
        $this->app->singleton(
            ShipmentRepositoryInterface::class,
            ShipmentRepository::class,
        );

        // cancel order
        $this->app->singleton(
            ReturnOrderRepositoryInterface::class,
            ReturnOrderRepository::class,
        );

        // cancel order detail
        $this->app->singleton(
            ReturnOrderDetailRepositoryInterface::class,
            ReturnOrderDetailRepository::class,
        );

        // Cart
        $this->app->singleton(
            CartRepositoryInterface::class,
            CartRepository::class,
        );

        // CartDetail
        $this->app->singleton(
            CartDetailRepositoryInterface::class,
            CartDetailRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
