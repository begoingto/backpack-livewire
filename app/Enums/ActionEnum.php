<?php
namespace App\Enums;

enum ActionEnum: string
{
    case CREATE = 'create';
    case UPDATE = 'update';
    case DELETE = 'delete';
    case EDIT = 'edit';
    case SELECTDELETE = 'selected_delete';
}
