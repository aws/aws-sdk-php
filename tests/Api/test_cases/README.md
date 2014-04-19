## Protocol test cases

The `tests/protocols` directory contains json test files that describe test
cases for input serialization of all the supported protocols.  Each file has
the following structure:

* The entire document is a JSON list.  Each list represents a test suite
* Each suite is a JSON object that contains these keys:
  * description - A description of the tests.
  * metadata - The top level metadata that would correspond to the `metadata`
    key in the service's JSON model.
  * shapes - A JSON object of shapes.  This would correspond to the top level
    `shapes` key in the service's JSON model.
  * cases - a JSON list of test cases.
* Each element in the `cases` list is a JSON object that contains these keys:
  * given - This corresponds to the JSON object that would define an operation
    in the service's JSON model.  Valid keys include `http`, `input`, and
    `name`.
  * params - The input parameters a user would provide.
  * serialized - The expected serialized HTTP request.  This is a JSON hash
    that can contain the following keys:
    * method - The HTTP method.
    * body - The HTTP body as a string.
    * uri - The uri of the request.
    * headers - Any HTTP headers for the HTTP request.

These input serialization tests are intended to:

* Describe how a user's input parameters are serialized onto an HTTP request.
* Use the same casing and names used in the JSON models.  This also includes
  the input parameters provided by a user.
* Remain implementation agnostic.  It makes no assumptions about an
  implementation.  Taking a user's input parameters and serializing them onto an
  HTTP request is something every AWS SDK must do.  This is what these tests
  describe.
