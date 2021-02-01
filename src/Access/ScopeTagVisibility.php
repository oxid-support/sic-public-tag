<?php

namespace OxidSupport\PublicTag\Access;

use Flarum\User\User;
use Illuminate\Database\Eloquent\Builder;

class ScopeTagVisibility
{
    public function __invoke(User $actor, Builder $query)
    {
        // Display all tags, no matter of restrictions.
        // Discussions within restricted tags are still not displayed.
        $query->orWhereNotIn('id', []);
    }

}
