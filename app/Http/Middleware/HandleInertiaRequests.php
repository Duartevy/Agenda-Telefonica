<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @return string
     */
    public function rootView(Request $request): string
    {
        return 'app';
    }

    /**
     * Determines the current asset version.
     *
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define os dados padrão que serão compartilhados com todas as views.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            // Adicione aqui os dados que você deseja compartilhar
        ]);
    }
}
