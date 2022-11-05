<?php
namespace Modules\Chat\Services\Enums;

enum PermissionEnum: int
{
    case READ = 1;
    case WRITE = 2;
    case UPDATE = 3;
    case DELETE = 4;
}
