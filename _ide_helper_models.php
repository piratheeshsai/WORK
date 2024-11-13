<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $subsections_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Subsection $subsection
 * @method static \Illuminate\Database\Eloquent\Builder|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereSubsectionsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subsection> $subsections
 * @property-read int|null $subsections_count
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereUpdatedAt($value)
 */
	class Section extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $section_head
 * @property int $section_id
 * @property string|null $recommender_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Department> $departments
 * @property-read int|null $departments_count
 * @property-read \App\Models\User|null $recommender
 * @property-read \App\Models\Section $section
 * @method static \Illuminate\Database\Eloquent\Builder|Subsection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subsection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subsection query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subsection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subsection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subsection whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subsection whereRecommenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subsection whereSectionHead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subsection whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subsection whereUpdatedAt($value)
 */
	class Subsection extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $userID
 * @property string $name
 * @property string $role
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserDetail|null $details
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subsection> $subsections
 * @property-read int|null $subsections_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\UserDetail|null $userDetails
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserID($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $EmployeeId
 * @property string $userID
 * @property string|null $full_name
 * @property string|null $section
 * @property string|null $subsection
 * @property string|null $department
 * @property string|null $PhoneNumber
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\workOrder> $workOrders
 * @property-read int|null $work_orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereSubsection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereUserID($value)
 */
	class UserDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $work_type
 * @property string $priority
 * @property string $complain
 * @property string $status
 * @property int $progress
 * @property string $EmployeeId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $recommender_id
 * @property-read \App\Models\User|null $recommender
 * @property-read \App\Models\Section|null $section
 * @property-read \App\Models\UserDetail $userDetails
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder whereComplain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder whereRecommenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|workOrder whereWorkType($value)
 */
	class workOrder extends \Eloquent {}
}

