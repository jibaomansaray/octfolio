<?php

namespace Octfolio\Libs;

class StringHelper
{

  /**
   * Takes a string and splits it into individual character
   * 
   * @param string $subject
   * 
   * @return Array<string>
   */
  public static function split(string $subject): array
  {
    return  str_split($subject);
  }

  /**
   * Changes the case of the provided string to upper case
   * 
   * @param string $subject
   * 
   * @return string
   */
  public static function upper(string $subject): string
  {
    return strtoupper($subject);
  }

  /**
   * Changes the case of the provided string to lower case
   * 
   * @param string
   * 
   * @return string
   */
  public static function lower(string $subject): string
  {
    return strtolower($subject);
  }

}
