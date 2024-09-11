<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Models\Contact;

class AddUnreadContactsToView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $unreadContacts = Contact::where('is_read', false)->get();
        View::share('unreadContacts', $unreadContacts);

        return $next($request);
    }
}
