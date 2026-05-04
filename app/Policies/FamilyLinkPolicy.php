<?php

namespace App\Policies;

use App\Models\FamilyLink;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FamilyLinkPolicy
{
    use HandlesAuthorization;

    public function approve(User $user, FamilyLink $familyLink)
    {
        return $user->id === $familyLink->family_member_id && $familyLink->status === 'pending';
    }

    public function reject(User $user, FamilyLink $familyLink)
    {
        return $user->id === $familyLink->family_member_id && $familyLink->status === 'pending';
    }

    public function view(User $user, FamilyLink $familyLink)
    {
        return $user->id === $familyLink->patient_id || $user->id === $familyLink->family_member_id;
    }

    public function delete(User $user, FamilyLink $familyLink)
    {
        return $user->id === $familyLink->patient_id || $user->id === $familyLink->family_member_id;
    }
}