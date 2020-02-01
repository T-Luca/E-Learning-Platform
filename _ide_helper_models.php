<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Authorization
 *
 * @method static where(array $array)
 * @property int $id
 * @property int $subcategory_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Subcategory $subcategory
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Authorization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Authorization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Authorization query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Authorization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Authorization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Authorization whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Authorization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Authorization whereUserId($value)
 * @mixin \Eloquent
 */
	class Authorization extends \Eloquent {}
}

namespace App{
/**
 * App\Category
 *
 * @method static find(int $id)
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $hidden
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subcategory[] $subcategories
 * @property-read int|null $subcategories_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App{
/**
 * App\Language
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Language extends \Eloquent {}
}

namespace App{
/**
 * App\Result
 *
 * @property int $id
 * @property int $user_id
 * @property int $set_id
 * @property int $result
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Set $set
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereSetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Result whereUserId($value)
 * @mixin \Eloquent
 */
	class Result extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\Set
 *
 * @method static find($id)
 * @method static where(string $string, string $string1, $id)
 * @property int $id
 * @property int $user_id
 * @property int $language1_id
 * @property int $language2_id
 * @property int $subcategory_id
 * @property string $name
 * @property string $set
 * @property int $hidden
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Result[] $results
 * @property-read int|null $results_count
 * @property-read \App\Subcategory $subcategory
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set whereLanguage1Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set whereLanguage2Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set whereSet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set whereUserId($value)
 * @mixin \Eloquent
 */
	class Set extends \Eloquent {}
}

namespace App{
/**
 * App\Subcategory
 *
 * @method static where(string $string, string $string1, int $id)
 * @method static find($id)
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $description
 * @property int $hidden
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Authorization[] $authorizations
 * @property-read int|null $authorizations_count
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Set[] $sets
 * @property-read int|null $sets_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subcategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subcategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subcategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subcategory whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subcategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subcategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Subcategory extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Authorization[] $authorizations
 * @property-read int|null $authorizations_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Set[] $sets
 * @property-read int|null $sets_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

