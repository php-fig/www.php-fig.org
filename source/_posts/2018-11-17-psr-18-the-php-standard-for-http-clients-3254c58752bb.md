---
title: "PSR-18: The PHP standard for HTTP\_clients"
description: >-
  A couple of days ago, the PHP Framework Interoperability Group (PHP-FIG)
  approved the PSR-18 “HTTP Client” standard. This standard was the last missing
  piece to build applications that need to send…
date: '2018-11-17T11:54:02.561Z'
categories: []
keywords: []
slug: psr-18-the-php-standard-for-http-clients
tags:
  - http
  - http-client
  - interoperability
author: davidbu
layout: post
use:
  - authors
  - posts
---
A couple of days ago, the PHP Framework Interoperability Group (PHP-FIG) approved the PSR-18 “HTTP Client” standard. This standard was the last missing piece to build applications that need to send HTTP requests to a server in an HTTP client agnostic way.

First, [PSR-7 “HTTP message interfaces”](https://www.php-fig.org/psr/psr-7/) defined how HTTP requests and responses are represented. For server applications that need to handle incoming requests and send a response, this was generally enough. The application bootstrap creates the request instance with a PSR-7 implementation and passes it into the application, which in turn can return any instance of a PSR-7 response. Middleware and other libraries can be reused as long as they rely on the PSR-7 interfaces.

However, sometimes an application needs to send a request to another server. Be that a storage backend that uses HTTP to communicate like ElasticSearch, or some third party service like Twitter, Instagram or weather. Public third party services often provide common client libraries. Since [PSR-17 “HTTP Factories”](https://www.php-fig.org/psr/psr-17/), this code does not need to bind itself to a specific implementation of PSR-7 but can use the factory to create requests.

Even with the request factory, libraries still had to depend on a concrete HTTP client implementation like Guzzle to actually send the request. (They can also do things themselves very low-level with `curl` calls, but this basically means implementing an own HTTP client.) Using a specific implementation of an HTTP client is not ideal. It becomes a problem when your application uses a client as well, or you start combining more than one client and they use different clients - or even more when needing different major versions of the same client. For example, Guzzle had to change its namespace from Guzzle to GuzzleHttp when switching from version 3 to 4 to allow both versions to be installed in parallel.

Libraries should not care about the implementation of the HTTP client, as long as they are able to send requests and receive responses. A group of people around Márk Sági-Kazár started defining an interface for the HTTP client, branded [HTTPlug](http://httplug.io/). Various libraries like Mailgun, Geocoder or Payum adopted their HTTP request handling to HTTPlug. Tobias Nyholm, Mark and myself proposed the HTTPlug interface to the PHP-FIG and it has been adopted as [PSR-18 “HTTP Client”](https://www.php-fig.org/psr/psr-18/) in October 2018. The interfaces are compatible from a consumer perspective. HTTPlug 2 implements PSR-18, while staying compatible to HTTPlug 1 for consumers. Consumers can upgrade from HTTPlug 1 to 2 seamlessly and then start transforming their code to the PSR interfaces. Eventually, HTTPlug should become obsolete and be replaced by the PSR-18 interfaces and HTTP clients directly implementing those interfaces.

PSR-18 defines a very small interface for sending HTTP requess and receiving the response. It also defines how the HTTP client implementation has to behave in regard to error handling and exceptions, redirections and similar things, so that consumers can rely on a reproducable behaviour. Bootstrapping the client with the necessary set up parameters is done in the application, and then inject the client to the consumer:

```
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestFactoryInterface;
class WebConsumer
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var RequestFactoryInterface
     */
    private $httpRequestFactory;
    public function __construct(
        ClientInterface $httpClient,
        RequestFactoryInterface $httpRequestFactory
    ) {
        $this->httpClient = $httpClient;
        $this->httpRequestFactory = $httpRequestFactory;
    }
    public function fetchInfo()
    {
        $request = $this->httpRequestFactory->createRequest('GET', 'https://www.liip.ch/');
        try {
            $response = $this->httpClient->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            throw new DomainException($e);
        }
        $response->...
    }
}
```

The dependencies of this class in the “use” statements are only the PSR interfaces, no need for specific implementations anymore.  
 Already, there is a release of `php-http/guzzle-adapter` that makes Guzzle available as PSR-18 client.

### Outlook

PSR-18 does not cover asynchronous requests. Sending requests asynchronous allows to send several HTTP requests in parallel or to continue with other work, then wait for the result. This can be more efficient and helps to reduce response times. Asynchronous requests return a “promise” that can be checked if the response has been received or waited on, to block until the response has arrived. The main reason PSR-18 does not cover asynchronous requests is that there is no PSR for promises. It would be wrong for a HTTP PSR to define the much broader concept of promises.

If you want to send asynchronous requests, you can use the [HTTPlug Promise component](http://docs.php-http.org/en/latest/components/promise.html) together with the HTTPlug `HttpAsyncClient`. The guzzle adapter mentioned above also provides this interface. When a PSR for promises has been ratified, we hope to do an additional PSR for asynchronous HTTP requests.

![HTTPlug Logo](/img/blog/1__yBqdI__HdOKpNDkkd7jNjrw.png)
HTTPlug Logo
