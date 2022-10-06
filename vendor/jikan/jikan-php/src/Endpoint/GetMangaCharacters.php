<?php declare(strict_types=1);

namespace Jikan\JikanPHP\Endpoint;

use Jikan\JikanPHP\Exception\GetMangaCharactersBadRequestException;
use Jikan\JikanPHP\Model\MangaCharacters;
use Jikan\JikanPHP\Runtime\Client\BaseEndpoint;
use Jikan\JikanPHP\Runtime\Client\Endpoint;
use Jikan\JikanPHP\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetMangaCharacters extends BaseEndpoint implements Endpoint
{
    public function __construct(protected int $id)
    {
    }

    use EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/manga/{id}/characters');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    protected function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * {@inheritdoc}
     *
     * @throws GetMangaCharactersBadRequestException
     *
     * @return null|MangaCharacters
     */
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null)
    {
        if (!is_null($contentType) && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, MangaCharacters::class, 'json');
        }

        if (400 === $status) {
            throw new GetMangaCharactersBadRequestException();
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
