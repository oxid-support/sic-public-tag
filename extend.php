<?php

use Flarum\Extend;
use Flarum\Discussion\Discussion;
use Flarum\Tags\Tag;
use OxidSupport\PublicTag\Access;

return [
    (new Extend\Frontend('admin'))
        ->js(__DIR__ . '/js/dist/admin.js'),

    (new Extend\ModelVisibility(Discussion::class))
        ->scope(Access\ScopeDiscussionVisibility::class),

    (new Extend\ModelVisibility(Tag::class))
        ->scope(Access\ScopeTagVisibility::class),
];
