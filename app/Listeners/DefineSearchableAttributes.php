<?php

namespace Modules\Chat\Listeners;

use Modules\Chat\Entities\Chat\ChatEntityModel;
use Modules\Chat\Models\ChatModel;
use Modules\Project\Events\EntityAttributesCreatedEvent;
use Modules\Project\Models\ProjectEntityAttributeModel;

class DefineSearchableAttributes
{
    private EntityAttributesCreatedEvent $event;

    public function handle(EntityAttributesCreatedEvent $event): void
    {
        $this->event = $event;
        if ($event->entity->module->name !== config('chat.name')) {
            return;
        }

        foreach ($event->entity->entityAttributes as $attribute) {
            $this->default($attribute);
        }
    }

    protected function default(ProjectEntityAttributeModel $attribute): void
    {
        if ($this->event->entity->name !== ChatModel::table()) {
            return;
        }
        $p = ChatEntityModel::props();
        if (in_array($attribute->name, [
            $p->id,
        ])) {
            $attribute->update(['searchable' => true]);
        }
    }
}
