<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],

    'company'     => [
        'title'          => 'Company',
        'title_singular' => 'Company',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Company',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'general_users'  => 'General Users',
        'talnet'         => 'Talnet',
        'artist_users'   => 'Artist Users',
        'agents'         => 'Agents',
        'student_import_success' => 'Students imported successfully.',
        'fields'         => [
            'id'                       => '#',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'group_file'               => 'Select File',
            'first_name'               => 'First Name',
            'last_name'                => 'Last Name',
            'email'                    => 'Email',
            'company'                  => 'Company',
            'business'                 => 'Business',
            'department'               => 'Department',
            'market_stall'             => 'Market Stall',
            'home'                     => 'Home',
            'city'                     => 'City',
            'state'                    => 'State',
            'phone'                    => 'Phone',
            'notes'                    => 'Notes',
            'avatar'                   => 'Photo',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'status'                   => 'Status',
        ],
    ],
    'detections'        => [
        'title'  => 'Detection',

        'fields' => [
            'id'                    => 'Id',
            'title'                 => 'Title',
            'datetime'              => 'Date and Hour',
            'category'              => 'Category',
            'analyst'               => 'Analyst',
            'description'           => 'Description',
            'dectection_level'      => 'Detection Level',
            'mark_read'             => 'Mark Read',
            'send_feedback'         => 'Send Feedback',
        ],
    ],
    'tags'        => [

        'fields' => [

        ],
    ],

];
