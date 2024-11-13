<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
// Add Plugins
use Njxqlus\FilamentProgressbar\FilamentProgressbarPlugin;
use Awcodes\LightSwitch\LightSwitchPlugin;
use Awcodes\LightSwitch\Enums\Alignment;
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
use Jeffgreco13\FilamentBreezy\BreezyCore;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration()
            ->brandName('GestoRemesas')
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => Color::Indigo,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([BreezyCore::make()
                ->myProfile(
                    shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                    shouldRegisterNavigation: false, // Adds a main navigation item for the My Profile page (default = false)
                    navigationGroup: 'Settings', // Sets the navigation group for the My Profile page (default = null)
                    hasAvatars: false, // Enables the avatar upload form component (default = false)
                    slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')
                ),
                FilamentProgressbarPlugin::make()->color('#dc2626'),
                LightSwitchPlugin::make()
                    ->position(Alignment::TopRight)
                    ->enabledOn([
                        'auth.email',
                        'auth.login',
                        'auth.password',
                        'auth.profile',
                        'auth.register',
                    ]),
                FilamentBackgroundsPlugin::make()
                    ->showAttribution(false)
                    ->remember(900),

            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
