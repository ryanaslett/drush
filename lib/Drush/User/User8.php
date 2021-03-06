<?php


namespace Drush\User;

use \Drupal\user\Entity\User;

class User8 extends UserVersion {

  /**
   * {inheritdoc}
   */
  public function create(array $properties) {
    $account = entity_create('user', $properties);
    $account->save();
    return $account;
  }

  /**
   * Attempt to load a user account.
   *
   * @param int $uid
   * @return \Drupal\user\Entity\User;
   */
  public function load_by_uid($uid) {
    return User::load($uid);
  }

  /**
   * {inheritdoc}
   */
  public function getCurrentUserAsAccount() {
    return \Drupal::currentUser()->getAccount();
  }

  /**
   * Set the current user in Drupal.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   */
  public function setCurrentUser($account) {
    \Drupal::currentUser()->setAccount($account);
  }
}
