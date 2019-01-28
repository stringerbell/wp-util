<?php

namespace App\Util;

use PHPUnit\Framework\TestCase;

class UtilTest extends TestCase {
  /** @var Util */
  private $testSubject;

  public function setUp() {
    $this->testSubject = new Util();
  }

  /**
   * @test
   * @dataProvider dataProvider
   */
  public function itWillDoTheThing($input, $output) {
    $this->assertEquals($output, $this->testSubject->getSvg($input));
  }

  /**
   * @test
   * @dataProvider dataProvider
   */
  public function alternateImplementationWillDoTheThing($input, $output) {
    $this->assertEquals($output, $this->testSubject->getSvg2($input));
  }

  /**
   * @test
   * @dataProvider dataProvider
   */
  public function checkToMakeSureIDidntBreakSomething($input, $output) {
    $this->assertEquals($this->testSubject->getSvg($input), $this->testSubject->getSvg2($input));
  }

  public function dataProvider() {
    return
      [
        ['user', '/views/partials/svg/user.svg'],
        ['user.svg', '/views/partials/svg/user.svg'],
        ['user.svg.svg', '/views/partials/svg/user.svg.svg'],
        ['/views/partials/svg/user.svg', '/views/partials/svg/user.svg'],
        // Unsure about these last two -- they don't pass, but both functions are identical
        ['/icons/user.svg', '/views/partials/svg/icons/user.svg'],
        ['views/partials/svg/icons/user.svg', '/views/partials/svg/icons/user.svg'],
        // other patterns to test
        ['svg/user.svg', '/views/partials/svg/user.svg'],
        ['/views/partials/svg/thing.svg', '/views/partials/svg/thing.svg'],
        ['views/partials/svg/thing.svg', '/views/partials/svg/thing.svg'],
        ['/partials/svg/thing.svg', '/views/partials/svg/thing.svg'],
        ['partials/svg/thing.svg', '/views/partials/svg/thing.svg'],
        ['/svg/thing.svg', '/views/partials/svg/thing.svg'],
        ['svg/thing.svg', '/views/partials/svg/thing.svg'],
        ['/thing.svg', '/views/partials/svg/thing.svg'],
        ['thing.svg', '/views/partials/svg/thing.svg'],
        ['thing.svg.svg', '/views/partials/svg/thing.svg.svg'],
        ['/icons/thing.svg', '/views/partials/svg/icons/thing.svg'],
        ['icon_mag-glass.svg', '/views/partials/svg/icon_mag-glass.svg'],
        ['svg_mag-glass.svg', '/views/partials/svg/svg_mag-glass.svg'],
        ['svg-partials_mag-glass.svg', '/views/partials/svg/svg-partials_mag-glass.svg'],
        ['/svg/partials_mag-glass.svg', '/views/partials/svg/partials_mag-glass.svg'],
        ['/icons/partials_mag-glass.svg', '/views/partials/svg/icons/partials_mag-glass.svg'],
        ['/views/partials/svg/icons/partials_mag-glass.svg', '/views/partials/svg/icons/partials_mag-glass.svg'],
      ];
  }
}
