<?php

namespace OxidSupport\PublicTag\Access;

use Flarum\Tags\Tag;
use Flarum\User\User;
use Illuminate\Database\Eloquent\Builder;

class ScopeTagVisibility
{
    public function __invoke(User $actor, Builder $query)
    {
        // Display all tags, no matter of restrictions.
        // Discussions within restricted tags are still not displayed.
        $query->orWhereIn('id', Tag::getIdsWhereCan($actor, 'discussion.viewTag'))
              ->orWhereIn('id', Tag::getIdsWhereCan($actor, 'viewTag'))
              ->orWhereIn('id', Tag::getIdsWhereCannot($actor, 'discussion.viewTag'))
              ->orWhereIn('id', Tag::getIdsWhereCannot($actor, 'viewTag'));
    }

}
