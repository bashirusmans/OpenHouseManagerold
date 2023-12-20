<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Gate;
use App\Models\Attendance;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'fullname', 'email', 'class', 'role', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function percentage(){
        $attendances = Attendance::where('studentid', $this->id)->get();
        $count = $attendances->count();
        $presents = Attendance::where('studentid', $this->id)
        ->where('isPresent', 1)->count();
        $percentage = ($count > 0) ? ($presents / $count) * 100 : 0;
        return $percentage;
    }

    public function class()
    {
        return $this->hasOne(ClassModel::class, 'teacherid', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'studentid', 'id');
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Check if the user is an administrator.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * Check if the user is a teacher.
     *
     * @return bool
     */
    public function isTeacher()
    {
        return $this->hasRole('teacher');
    }

    /**
     * Check if the user is a student.
     *
     * @return bool
     */
    public function isStudent()
    {
        return $this->hasRole('student');
    }

    public function students()
    {
        return $this->hasManyThrough(User::class, ClassModel::class, 'teacherid', 'class', 'id', 'id');
    }

    /**
     * Check if the user can perform a given action.
     *
     * @param string $ability
     * @param mixed $arguments
     * @return bool
     */
    public function can($ability, $arguments = [])
    {
        return Gate::forUser($this)->allows($ability, $arguments);
    }
}
?>