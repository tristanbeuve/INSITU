// src/Document/User.php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class User
{
    #[MongoDB\Id]
    protected string $id;

    #[MongoDB\Field(type: 'string')]
    protected string $name;

    #[MongoDB\Field(type: 'string')]
    protected string $email;

    // Getters / Setters
}
