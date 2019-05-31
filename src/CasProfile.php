<?php

/**
 * @license MIT License
 */

namespace silecs\yii2auth\cas;

use phpCAS;

/**
 * The user profile that the CAS server returned.
 *
 * @property boolean $isGuest If false, the user was authenticated by CAS
 * @property boolean $username Username if the user was authenticated by CAS, else an empty string
 *
 * @author François Gannaz <francois.gannaz@silecs.info>
 */
class CasProfile extends \yii\base\Component
{
    public function getIsGuest()
    {
        return phpCAS::isAuthenticated();
    }

    /**
     * Get the username if the CAS authentication succeeded.
     *
     * @return string Username, or empty string if not authenticated.
     */
    public function getUsername()
    {
        if (phpCAS::isAuthenticated()) {
            return phpCAS::getUser();
        }

        return "";
    }

    /**
     * Answer attributes about the authenticated user.
     *
     * @return array
     */
    public function getAttributes()
    {
        if (phpCAS::isAuthenticated()) {
            return phpCAS::getAttributes();
        }

        return [];
    }

    /**
     * Answer true if there are attributes for the authenticated user.
     *
     * @return bool
     */
    public function hasAttributes()
    {
        if (phpCAS::isAuthenticated()) {
            return phpCAS::hasAttributes();
        }

        return false;
    }

    /**
     * Answer true if an attribute exists for the authenticated user.
     *
     * @param string $key attribute name
     *
     * @return bool
     */
    public function hasAttribute($key)
    {
        if (phpCAS::isAuthenticated()) {
            return phpCAS::hasAttribute($key);
        }

        return false;
    }

    /**
     * Answer an attribute for the authenticated user.
     *
     * @param string $key attribute name
     *
     * @return mixed string for a single value or an array if multiple values exist.
     */
    public function getAttribute($key)
    {
        if (phpCAS::isAuthenticated()) {
            return phpCAS::getAttribute($key);
        }

        return null;
    }
}
