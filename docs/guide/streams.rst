=======
Streams
=======

As part of its integration of the `PSR-7 <http://www.php-fig.org/psr/psr-7/>`_
HTTP message standard, the AWS SDK for PHP uses the `PSR-7 StreamInterface
<http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Psr.Http.Message.StreamInterface.html>`_
internally as its abstraction over `PHP streams
<http://php.net/manual/en/intro.stream.php>`_. Any command with an input field
defined as a blob, such as the ``Body`` parameter on an `S3::PutObject command
<http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#putobject>`_,
can be satisfied with a string, a PHP stream resource, or an instance of
``Psr\Http\Message\StreamInterface``.

.. warning::

    The SDK will take ownership of any raw PHP stream resource supplied as an
    input parameter to a command. The stream will be consumed and closed on your
    behalf.

    If you need to share a stream between an SDK operation and your code, wrap
    it in an instance of ``GuzzleHttp\Psr7\Stream`` before including it as a
    command parameter. The SDK will consume the stream, so your code will need
    to account for movement of the stream's internal cursor. Guzzle streams will
    call ``fclose`` on the underlying stream resource when they are destroyed by
    PHP's garbage collector, so you will not need to close the stream yourself.


Stream Decorators
-----------------

Guzzle provides several stream decorators that can be used to control how the
SDK and Guzzle interact with the streaming resource provided as an input
parameter to a command. These decorators can modify how handlers will be able
to read and seek on a given stream. The following is a partial list; more can be
found on the `GuzzleHttp\Psr7 repository <https://github.com/guzzle/psr7>`_.

AppendStream
~~~~~~~~~~~~

`GuzzleHttp\\Psr7\\AppendStream <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-GuzzleHttp.Psr7.AppendStream.html>`_

Reads from multiple streams, one after the other.

.. code-block:: php

    use GuzzleHttp\Psr7;

    $a = Psr7\stream_for('abc, ');
    $b = Psr7\stream_for('123.');
    $composed = new Psr7\AppendStream([$a, $b]);

    $composed->addStream(Psr7\stream_for(' Above all listen to me'));

    echo $composed(); // abc, 123. Above all listen to me.


CachingStream
~~~~~~~~~~~~~

`GuzzleHttp\\Psr7\\CachingStream <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-GuzzleHttp.Psr7.CachingStream.html>`_

The CachingStream is used to allow seeking over previously read bytes on
non-seekable streams. This can be useful when transferring a non-seekable
entity body fails due to needing to rewind the stream (for example, resulting
from a redirect). Data that is read from the remote stream will be buffered in
a PHP temp stream so that previously read bytes are cached first in memory,
then on disk.

.. code-block:: php

    use GuzzleHttp\Psr7;

    $original = Psr7\stream_for(fopen('http://www.google.com', 'r'));
    $stream = new Psr7\CachingStream($original);

    $stream->read(1024);
    echo $stream->tell();
    // 1024

    $stream->seek(0);
    echo $stream->tell();
    // 0


InflateStream
~~~~~~~~~~~~~

`GuzzleHttp\\Psr7\\InflateStream <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-GuzzleHttp.Psr7.InflateStream.html>`_

Uses PHP's zlib.inflate filter to inflate deflate or gzipped content.

This stream decorator skips the first 10 bytes of the given stream to remove
the gzip header, converts the provided stream to a PHP stream resource,
then appends the zlib.inflate filter. The stream is then converted back
to a Guzzle stream resource to be used as a Guzzle stream.


LazyOpenStream
~~~~~~~~~~~~~~

`GuzzleHttp\\Psr7\\LazyOpenStream <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-GuzzleHttp.Psr7.LazyOpenStream.html>`_

Lazily reads or writes to a file that is opened only after an IO operation
take place on the stream.

.. code-block:: php

    use GuzzleHttp\Psr7;

    $stream = new Psr7\LazyOpenStream('/path/to/file', 'r');
    // The file has not yet been opened...

    echo $stream->read(10);
    // The file is opened and read from only when needed.


LimitStream
~~~~~~~~~~~

`GuzzleHttp\\Psr7\\LimitStream <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-GuzzleHttp.Psr7.LimitStream.html>`_

LimitStream can be used to read a subset or slice of an existing stream object.
This can be useful for breaking a large file into smaller pieces to be sent in
chunks (e.g. Amazon S3's multipart upload API).

.. code-block:: php

    use GuzzleHttp\Psr7;

    $original = Psr7\stream_for(fopen('/tmp/test.txt', 'r+'));
    echo $original->getSize();
    // >>> 1048576

    // Limit the size of the body to 1024 bytes and start reading from byte 2048
    $stream = new Psr7\LimitStream($original, 1024, 2048);
    echo $stream->getSize();
    // >>> 1024
    echo $stream->tell();
    // >>> 0


NoSeekStream
~~~~~~~~~~~~

`GuzzleHttp\\Psr7\\NoSeekStream <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-GuzzleHttp.Psr7.NoSeekStream.html>`_

NoSeekStream wraps a stream and does not allow seeking.

.. code-block:: php

    use GuzzleHttp\Psr7;

    $original = Psr7\stream_for('foo');
    $noSeek = new Psr7\NoSeekStream($original);

    echo $noSeek->read(3);
    // foo
    var_export($noSeek->isSeekable());
    // false
    $noSeek->seek(0);
    var_export($noSeek->read(3));
    // NULL


PumpStream
~~~~~~~~~~

`GuzzleHttp\\Psr7\\PumpStream <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-GuzzleHttp.Psr7.PumpStream.html>`_

Provides a read only stream that pumps data from a PHP callable.

When invoking the provided callable, the PumpStream will pass the amount of
data requested to read to the callable. The callable can choose to ignore
this value and return fewer or more bytes than requested. Any extra data
returned by the provided callable is buffered internally until drained using
the read() function of the PumpStream. The provided callable MUST return
false when there is no more data to read.


Implementing stream decorators
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Creating a stream decorator is very easy thanks to the
`GuzzleHttp\\Psr7\\StreamDecoratorTrait
<http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-GuzzleHttp.Psr7.StreamDecoratorTrait.html>`_.
This trait provides methods that implement ``Psr\Http\Message\StreamInterface``
by proxying to an underlying stream. Just ``use`` the ``StreamDecoratorTrait``
and implement your custom methods.

For example, let's say we wanted to call a specific function each time the last
byte is read from a stream. This could be implemented by overriding the
``read()`` method.

.. code-block:: php

    use Psr\Http\Message\StreamInterface;
    use GuzzleHttp\Psr7\StreamDecoratorTrait;

    class EofCallbackStream implements StreamInterface
    {
        use StreamDecoratorTrait;

        private $callback;

        public function __construct(StreamInterface $stream, callable $cb)
        {
            $this->stream = $stream;
            $this->callback = $cb;
        }

        public function read($length)
        {
            $result = $this->stream->read($length);

            // Invoke the callback when EOF is hit.
            if ($this->eof()) {
                call_user_func($this->callback);
            }

            return $result;
        }
    }

This decorator could be added to any existing stream and used like so:

.. code-block:: php

    use GuzzleHttp\Psr7;

    $original = Psr7\stream_for('foo');

    $eofStream = new EofCallbackStream($original, function () {
        echo 'EOF!';
    });

    $eofStream->read(2);
    $eofStream->read(1);
    // echoes "EOF!"
    $eofStream->seek(0);
    $eofStream->read(3);
    // echoes "EOF!"


