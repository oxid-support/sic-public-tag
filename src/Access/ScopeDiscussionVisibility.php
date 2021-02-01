<?php

namespace OxidSupport\PublicTag\Access;

use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\User\User;
use Illuminate\Database\Eloquent\Builder;

class ScopeDiscussionVisibility
{
    protected $settings;

    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function __invoke(User $actor, Builder $query)
    {
        // Display all discussions, which have the public tag even if they have another restricted tag.
        $query->orWhere(function ($query) use ($actor) {
            $query
                ->orWhereIn('discussions.id', function ($query) use ($actor) {
                    return $query->select('discussion_id')
                        ->from('discussion_tag')
                        ->where('tag_id', $this->getIdOfPublicTag());
                });
        });
    }

    private function getIdOfPublicTag()
    {
        $id = $this->settings->get('sic-public-tag.tag-id');

        if (is_numeric($id)) {
            return $id;
        } else {
            return 999999;
        }
    }
}
