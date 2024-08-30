<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $nickname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthDate = null;

    #[ORM\Column(length: 255)]
    private ?string $sex = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $userPhoto = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Painting::class)]
    private Collection $paintings;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Poem::class)]
    private Collection $poems;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Origami::class)]
    private Collection $origamis;

    public function __construct()
    {
        $this->paintings = new ArrayCollection();
        $this->poems = new ArrayCollection();
        $this->origamis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): static
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): static
    {
        $this->sex = $sex;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getUserPhoto(): ?string
    {
        return $this->userPhoto;
    }

    public function setUserPhoto(string $userPhoto): static
    {
        $this->userPhoto = $userPhoto;

        return $this;
    }


    /**
     * @return Collection<int, Painting>
     */
    public function getPaintings(): Collection
    {
        return $this->paintings;
    }

    public function addPainting(Painting $painting): static
    {
        if (!$this->paintings->contains($painting)) {
            $this->paintings->add($painting);
            $painting->setUser($this);
        }

        return $this;
    }

    public function removePainting(Painting $painting): static
    {
        if ($this->paintings->removeElement($painting)) {
            // set the owning side to null (unless already changed)
            if ($painting->getUser() === $this) {
                $painting->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Poem>
     */
    public function getPoems(): Collection
    {
        return $this->poems;
    }

    public function addPoem(Poem $poem): static
    {
        if (!$this->poems->contains($poem)) {
            $this->poems->add($poem);
            $poem->setUser($this);
        }

        return $this;
    }

    public function removePoem(Poem $poem): static
    {
        if ($this->poems->removeElement($poem)) {
            // set the owning side to null (unless already changed)
            if ($poem->getUser() === $this) {
                $poem->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Origami>
     */
    public function getOrigamis(): Collection
    {
        return $this->origamis;
    }

    public function addOrigami(Origami $origami): static
    {
        if (!$this->origamis->contains($origami)) {
            $this->origamis->add($origami);
            $origami->setUser($this);
        }

        return $this;
    }

    public function removeOrigami(Origami $origami): static
    {
        if ($this->origamis->removeElement($origami)) {
            // set the owning side to null (unless already changed)
            if ($origami->getUser() === $this) {
                $origami->setUser(null);
            }
        }

        return $this;
    }

}
