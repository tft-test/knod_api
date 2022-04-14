<?php /** @noinspection PhpPropertyOnlyWrittenInspection */

/*
 * This file describes the Admin resource.
 */
namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ORM\Table(name: '`admins`')]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Document::class)]
    private $documents;

    #[ORM\OneToMany(mappedBy: 'supportBy', targetEntity: Contact::class)]
    private $contacts;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Faq::class)]
    private $faqs;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: EventCategory::class)]
    private $eventCategories;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Company::class)]
    private $companies;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: CompanyCategory::class)]
    private $companyCategories;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Advert::class)]
    private $adverts;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: AdvertCategory::class)]
    private $advertCategories;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: AdvertType::class)]
    private $advertTypes;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
        $this->contacts = new ArrayCollection();
        $this->faqs = new ArrayCollection();
        $this->eventCategories = new ArrayCollection();
        $this->companies = new ArrayCollection();
        $this->companyCategories = new ArrayCollection();
        $this->adverts = new ArrayCollection();
        $this->advertCategories = new ArrayCollection();
        $this->advertTypes = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setAuthor($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getAuthor() === $this) {
                $document->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Contact>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->setSupportBy($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getSupportBy() === $this) {
                $contact->setSupportBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Faq>
     */
    public function getFaqs(): Collection
    {
        return $this->faqs;
    }

    public function addFaq(Faq $faq): self
    {
        if (!$this->faqs->contains($faq)) {
            $this->faqs[] = $faq;
            $faq->setAuthor($this);
        }

        return $this;
    }

    public function removeFaq(Faq $faq): self
    {
        if ($this->faqs->removeElement($faq)) {
            // set the owning side to null (unless already changed)
            if ($faq->getAuthor() === $this) {
                $faq->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EventCategory>
     */
    public function getEventCategories(): Collection
    {
        return $this->eventCategories;
    }

    public function addEventCategory(EventCategory $eventCategory): self
    {
        if (!$this->eventCategories->contains($eventCategory)) {
            $this->eventCategories[] = $eventCategory;
            $eventCategory->setAuthor($this);
        }

        return $this;
    }

    public function removeEventCategory(EventCategory $eventCategory): self
    {
        if ($this->eventCategories->removeElement($eventCategory)) {
            // set the owning side to null (unless already changed)
            if ($eventCategory->getAuthor() === $this) {
                $eventCategory->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Company>
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->companies->contains($company)) {
            $this->companies[] = $company;
            $company->setAuthor($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): self
    {
        if ($this->companies->removeElement($company)) {
            // set the owning side to null (unless already changed)
            if ($company->getAuthor() === $this) {
                $company->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CompanyCategory>
     */
    public function getCompanyCategories(): Collection
    {
        return $this->companyCategories;
    }

    public function addCompanyCategory(CompanyCategory $companyCategory): self
    {
        if (!$this->companyCategories->contains($companyCategory)) {
            $this->companyCategories[] = $companyCategory;
            $companyCategory->setAuthor($this);
        }

        return $this;
    }

    public function removeCompanyCategory(CompanyCategory $companyCategory): self
    {
        if ($this->companyCategories->removeElement($companyCategory)) {
            // set the owning side to null (unless already changed)
            if ($companyCategory->getAuthor() === $this) {
                $companyCategory->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Advert>
     */
    public function getAdverts(): Collection
    {
        return $this->adverts;
    }

    public function addAdvert(Advert $advert): self
    {
        if (!$this->adverts->contains($advert)) {
            $this->adverts[] = $advert;
            $advert->setAuthor($this);
        }

        return $this;
    }

    public function removeAdvert(Advert $advert): self
    {
        if ($this->adverts->removeElement($advert)) {
            // set the owning side to null (unless already changed)
            if ($advert->getAuthor() === $this) {
                $advert->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AdvertCategory>
     */
    public function getAdvertCategories(): Collection
    {
        return $this->advertCategories;
    }

    public function addAdvertCategory(AdvertCategory $advertCategory): self
    {
        if (!$this->advertCategories->contains($advertCategory)) {
            $this->advertCategories[] = $advertCategory;
            $advertCategory->setAuthor($this);
        }

        return $this;
    }

    public function removeAdvertCategory(AdvertCategory $advertCategory): self
    {
        if ($this->advertCategories->removeElement($advertCategory)) {
            // set the owning side to null (unless already changed)
            if ($advertCategory->getAuthor() === $this) {
                $advertCategory->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AdvertType>
     */
    public function getAdvertTypes(): Collection
    {
        return $this->advertTypes;
    }

    public function addAdvertType(AdvertType $advertType): self
    {
        if (!$this->advertTypes->contains($advertType)) {
            $this->advertTypes[] = $advertType;
            $advertType->setAuthor($this);
        }

        return $this;
    }

    public function removeAdvertType(AdvertType $advertType): self
    {
        if ($this->advertTypes->removeElement($advertType)) {
            // set the owning side to null (unless already changed)
            if ($advertType->getAuthor() === $this) {
                $advertType->setAuthor(null);
            }
        }

        return $this;
    }
}
