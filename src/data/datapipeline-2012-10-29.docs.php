<?php return [
  'operations' => [
    'ActivatePipeline' => '<p> Validates a pipeline and initiates processing. If the pipeline does not pass validation, activation fails. You cannot perform this operation on FINISHED pipelines and attempting to do so will return an InvalidRequestException. </p> <p> Call this action to start processing pipeline tasks of a pipeline you\'ve created using the <a>CreatePipeline</a> and <a>PutPipelineDefinition</a> actions. A pipeline cannot be modified after it has been successfully activated. </p>',
    'CreatePipeline' => '<p>Creates a new empty pipeline. When this action succeeds, you can then use the <a>PutPipelineDefinition</a> action to populate the pipeline.</p>',
    'DeletePipeline' => '<p> Permanently deletes a pipeline, its pipeline definition and its run history. You cannot query or restore a deleted pipeline. AWS Data Pipeline will attempt to cancel instances associated with the pipeline that are currently being processed by task runners. Deleting a pipeline cannot be undone. </p> <p> To temporarily pause a pipeline instead of deleting it, call <a>SetStatus</a> with the status set to Pause on individual components. Components that are paused by <a>SetStatus</a> can be resumed. </p>',
    'DescribeObjects' => '<p> Returns the object definitions for a set of objects associated with the pipeline. Object definitions are composed of a set of fields that define the properties of the object. </p>',
    'DescribePipelines' => '<p> Retrieve metadata about one or more pipelines. The information retrieved includes the name of the pipeline, the pipeline identifier, its current state, and the user account that owns the pipeline. Using account credentials, you can retrieve metadata about pipelines that you or your IAM users have created. If you are using an IAM user account, you can retrieve metadata about only those pipelines you have read permission for. </p> <p> To retrieve the full pipeline definition instead of metadata about the pipeline, call the <a>GetPipelineDefinition</a> action. </p>',
    'EvaluateExpression' => '<p>Evaluates a string in the context of a specified object. A task runner can use this action to evaluate SQL queries stored in Amazon S3. </p>',
    'GetPipelineDefinition' => '<p>Returns the definition of the specified pipeline. You can call <a>GetPipelineDefinition</a> to retrieve the pipeline definition you provided using <a>PutPipelineDefinition</a>.</p>',
    'ListPipelines' => '<p>Returns a list of pipeline identifiers for all active pipelines. Identifiers are returned only for pipelines you have permission to access. </p>',
    'PollForTask' => '<p> Task runners call this action to receive a task to perform from AWS Data Pipeline. The task runner specifies which tasks it can perform by setting a value for the workerGroup parameter of the <a>PollForTask</a> call. The task returned by <a>PollForTask</a> may come from any of the pipelines that match the workerGroup value passed in by the task runner and that was launched using the IAM user credentials specified by the task runner. </p> <p> If tasks are ready in the work queue, <a>PollForTask</a> returns a response immediately. If no tasks are available in the queue, <a>PollForTask</a> uses long-polling and holds on to a poll connection for up to a 90 seconds during which time the first newly scheduled task is handed to the task runner. To accomodate this, set the socket timeout in your task runner to 90 seconds. The task runner should not call <a>PollForTask</a> again on the same <code>workerGroup</code> until it receives a response, and this may take up to 90 seconds. </p>',
    'PutPipelineDefinition' => '<p>Adds tasks, schedules, and preconditions that control the behavior of the pipeline. You can use PutPipelineDefinition to populate a new pipeline. </p> <p> <a>PutPipelineDefinition</a> also validates the configuration as it adds it to the pipeline. Changes to the pipeline are saved unless one of the following three validation errors exists in the pipeline. <ol> <li>An object is missing a name or identifier field.</li> <li>A string or reference field is empty.</li> <li>The number of objects in the pipeline exceeds the maximum allowed objects.</li> <li>The pipeline is in a FINISHED state.</li> </ol> </p> <p> Pipeline object definitions are passed to the <a>PutPipelineDefinition</a> action and returned by the <a>GetPipelineDefinition</a> action. </p>',
    'QueryObjects' => '<p>Queries a pipeline for the names of objects that match a specified set of conditions.</p> <p>The objects returned by <a>QueryObjects</a> are paginated and then filtered by the value you set for query. This means the action may return an empty result set with a value set for marker. If <code>HasMoreResults</code> is set to <code>True</code>, you should continue to call <a>QueryObjects</a>, passing in the returned value for marker, until <code>HasMoreResults</code> returns <code>False</code>.</p>',
    'ReportTaskProgress' => '<p> Updates the AWS Data Pipeline service on the progress of the calling task runner. When the task runner is assigned a task, it should call ReportTaskProgress to acknowledge that it has the task within 2 minutes. If the web service does not recieve this acknowledgement within the 2 minute window, it will assign the task in a subsequent <a>PollForTask</a> call. After this initial acknowledgement, the task runner only needs to report progress every 15 minutes to maintain its ownership of the task. You can change this reporting time from 15 minutes by specifying a <code>reportProgressTimeout</code> field in your pipeline. If a task runner does not report its status after 5 minutes, AWS Data Pipeline will assume that the task runner is unable to process the task and will reassign the task in a subsequent response to <a>PollForTask</a>. task runners should call <a>ReportTaskProgress</a> every 60 seconds. </p>',
    'ReportTaskRunnerHeartbeat' => '<p>Task runners call <a>ReportTaskRunnerHeartbeat</a> every 15 minutes to indicate that they are operational. In the case of AWS Data Pipeline Task Runner launched on a resource managed by AWS Data Pipeline, the web service can use this call to detect when the task runner application has failed and restart a new instance.</p>',
    'SetStatus' => '<p>Requests that the status of an array of physical or logical pipeline objects be updated in the pipeline. This update may not occur immediately, but is eventually consistent. The status that can be set depends on the type of object, e.g. DataNode or Activity. You cannot perform this operation on FINISHED pipelines and attempting to do so will return an InvalidRequestException.</p>',
    'SetTaskStatus' => '<p> Notifies AWS Data Pipeline that a task is completed and provides information about the final status. The task runner calls this action regardless of whether the task was sucessful. The task runner does not need to call <a>SetTaskStatus</a> for tasks that are canceled by the web service during a call to <a>ReportTaskProgress</a>. </p>',
    'ValidatePipelineDefinition' => '<p>Tests the pipeline definition with a set of validation checks to ensure that it is well formed and can run without error. </p>',
  ],
  'service' => '<p> AWS Data Pipeline is a web service that configures and manages a data-driven workflow called a pipeline. AWS Data Pipeline handles the details of scheduling and ensuring that data dependencies are met so your application can focus on processing the data.</p> <p> The AWS Data Pipeline SDKs and CLI implements two main sets of functionality. The first set of actions configure the pipeline in the web service. You perform these actions to create a pipeline and define data sources, schedules, dependencies, and the transforms to be performed on the data. </p> <p> The second set of actions are used by a task runner application that calls the AWS Data Pipeline API to receive the next task ready for processing. The logic for performing the task, such as querying the data, running data analysis, or converting the data from one format to another, is contained within the task runner. The task runner performs the task assigned to it by the web service, reporting progress to the web service as it does so. When the task is done, the task runner reports the final success or failure of the task to the web service. </p> <p> AWS Data Pipeline provides a JAR implementation of a task runner called AWS Data Pipeline Task Runner. AWS Data Pipeline Task Runner provides logic for common data management scenarios, such as performing database queries and running data analysis using Amazon Elastic MapReduce (Amazon EMR]. You can use AWS Data Pipeline Task Runner as your task runner, or you can write your own task runner to provide custom data management. </p>',
  'shapes' => [
    'ActivatePipelineInput' => [
      'base' => '<p>The input of the ActivatePipeline action.</p>',
      'refs' => [],
    ],
    'ActivatePipelineOutput' => [
      'base' => '<p>Contains the output from the <a>ActivatePipeline</a> action.</p>',
      'refs' => [],
    ],
    'CreatePipelineInput' => [
      'base' => '<p>The input for the <a>CreatePipeline</a> action.</p>',
      'refs' => [],
    ],
    'CreatePipelineOutput' => [
      'base' => '<p>Contains the output from the <a>CreatePipeline</a> action.</p>',
      'refs' => [],
    ],
    'DeletePipelineInput' => [
      'base' => '<p>The input for the <a>DeletePipeline</a> action.</p>',
      'refs' => [],
    ],
    'DescribeObjectsInput' => [
      'base' => '<p> The <a>DescribeObjects</a> action returns the object definitions for a specified set of object identifiers. You can filter the results to named fields and used markers to page through the results. </p>',
      'refs' => [],
    ],
    'DescribeObjectsOutput' => [
      'base' => '<p>If <code>True</code>, there are more results that can be returned in another call to <a>DescribeObjects</a>.</p>',
      'refs' => [],
    ],
    'DescribePipelinesInput' => [
      'base' => '<p>The input to the <a>DescribePipelines</a> action.</p>',
      'refs' => [],
    ],
    'DescribePipelinesOutput' => [
      'base' => '<p>Contains the output from the <a>DescribePipelines</a> action.</p>',
      'refs' => [],
    ],
    'EvaluateExpressionInput' => [
      'base' => '<p>The input for the <a>EvaluateExpression</a> action.</p>',
      'refs' => [],
    ],
    'EvaluateExpressionOutput' => [
      'base' => '<p>Contains the output from the <a>EvaluateExpression</a> action.</p>',
      'refs' => [],
    ],
    'Field' => [
      'base' => '<p>A key-value pair that describes a property of a pipeline object. The value is specified as either a string value (<code>StringValue</code>] or a reference to another object (<code>RefValue</code>] but not as both.</p>',
      'refs' => [
        'fieldList$member' => NULL,
      ],
    ],
    'GetPipelineDefinitionInput' => [
      'base' => '<p>The input for the <a>GetPipelineDefinition</a> action.</p>',
      'refs' => [],
    ],
    'GetPipelineDefinitionOutput' => [
      'base' => '<p>Contains the output from the <a>GetPipelineDefinition</a> action.</p>',
      'refs' => [],
    ],
    'InstanceIdentity' => [
      'base' => '<p><p>Identity information for the Amazon EC2 instance that is hosting the task runner. You can get this value by calling a metadata URI from the EC2 instance. For more information, go to <a href="http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/AESDG-chapter-instancedata.html">Instance Metadata</a> in the <i>Amazon Elastic Compute Cloud User Guide.</i> Passing in this value proves that your task runner is running on an EC2 instance, and ensures the proper AWS Data Pipeline service charges are applied to your pipeline.</p></p>',
      'refs' => [
        'PollForTaskInput$instanceIdentity' => '<p>Identity information for the Amazon EC2 instance that is hosting the task runner. You can get this value by calling the URI, <code>http://169.254.169.254/latest/meta-data/instance-id</code>, from the EC2 instance. For more information, go to <a href="http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/AESDG-chapter-instancedata.html">Instance Metadata</a> in the <i>Amazon Elastic Compute Cloud User Guide.</i> Passing in this value proves that your task runner is running on an EC2 instance, and ensures the proper AWS Data Pipeline service charges are applied to your pipeline.</p>',
      ],
    ],
    'InternalServiceError' => [
      'base' => '<p>An internal service error occurred.</p>',
      'refs' => [],
    ],
    'InvalidRequestException' => [
      'base' => '<p>The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.</p>',
      'refs' => [],
    ],
    'ListPipelinesInput' => [
      'base' => '<p>The input to the <a>ListPipelines</a> action.</p>',
      'refs' => [],
    ],
    'ListPipelinesOutput' => [
      'base' => '<p>Contains the output from the <a>ListPipelines</a> action.</p>',
      'refs' => [],
    ],
    'Operator' => [
      'base' => '<p>Contains a logical operation for comparing the value of a field with a specified value.</p>',
      'refs' => [
        'Selector$operator' => NULL,
      ],
    ],
    'OperatorType' => [
      'base' => NULL,
      'refs' => [
        'Operator$type' => '<p> The logical operation to be performed: equal (<code>EQ</code>], equal reference (<code>REF_EQ</code>], less than or equal (<code>LE</code>], greater than or equal (<code>GE</code>], or between (<code>BETWEEN</code>]. Equal reference (<code>REF_EQ</code>] can be used only with reference fields. The other comparison types can be used only with String fields. The comparison types you can use apply only to certain object fields, as detailed below. </p> <p> The comparison operators EQ and REF_EQ act on the following fields: </p> <ul> <li>name</li> <li>@sphere</li> <li>parent</li> <li>@componentParent</li> <li>@instanceParent</li> <li>@status</li> <li>@scheduledStartTime</li> <li>@scheduledEndTime</li> <li>@actualStartTime</li> <li>@actualEndTime</li> </ul> <p> The comparison operators <code>GE</code>, <code>LE</code>, and <code>BETWEEN</code> act on the following fields: </p> <ul> <li>@scheduledStartTime</li> <li>@scheduledEndTime</li> <li>@actualStartTime</li> <li>@actualEndTime</li> </ul> <p>Note that fields beginning with the at sign (@] are read-only and set by the web service. When you name fields, you should choose names containing only alpha-numeric values, as symbols may be reserved by AWS Data Pipeline. User-defined fields that you add to a pipeline should prefix their name with the string "my".</p>',
      ],
    ],
    'ParameterAttribute' => [
      'base' => '<p>The attributes allowed or specified with a parameter object.</p>',
      'refs' => [
        'ParameterAttributeList$member' => NULL,
      ],
    ],
    'ParameterAttributeList' => [
      'base' => NULL,
      'refs' => [
        'ParameterObject$attributes' => '<p>The attributes of the parameter object.</p>',
      ],
    ],
    'ParameterObject' => [
      'base' => '<p>Contains information about a parameter object.</p>',
      'refs' => [
        'ParameterObjectList$member' => NULL,
      ],
    ],
    'ParameterObjectList' => [
      'base' => NULL,
      'refs' => [
        'GetPipelineDefinitionOutput$parameterObjects' => '<p>Returns a list of parameter objects used in the pipeline definition.</p>',
        'PutPipelineDefinitionInput$parameterObjects' => '<p>A list of parameter objects used with the pipeline.</p>',
        'ValidatePipelineDefinitionInput$parameterObjects' => '<p>A list of parameter objects used with the pipeline.</p>',
      ],
    ],
    'ParameterValue' => [
      'base' => '<p>A value or list of parameter values. </p>',
      'refs' => [
        'ParameterValueList$member' => NULL,
      ],
    ],
    'ParameterValueList' => [
      'base' => NULL,
      'refs' => [
        'ActivatePipelineInput$parameterValues' => '<p>Returns a list of parameter values to pass to the pipeline at activation.</p>',
        'GetPipelineDefinitionOutput$parameterValues' => '<p>Returns a list of parameter values used in the pipeline definition.</p>',
        'PutPipelineDefinitionInput$parameterValues' => '<p>A list of parameter values used with the pipeline.</p>',
        'ValidatePipelineDefinitionInput$parameterValues' => '<p>A list of parameter values used with the pipeline.</p>',
      ],
    ],
    'PipelineDeletedException' => [
      'base' => '<p>The specified pipeline has been deleted.</p>',
      'refs' => [],
    ],
    'PipelineDescription' => [
      'base' => '<p>Contains pipeline metadata.</p>',
      'refs' => [
        'PipelineDescriptionList$member' => NULL,
      ],
    ],
    'PipelineDescriptionList' => [
      'base' => NULL,
      'refs' => [
        'DescribePipelinesOutput$pipelineDescriptionList' => '<p>An array of descriptions returned for the specified pipelines.</p>',
      ],
    ],
    'PipelineIdName' => [
      'base' => '<p>Contains the name and identifier of a pipeline.</p>',
      'refs' => [
        'pipelineList$member' => NULL,
      ],
    ],
    'PipelineNotFoundException' => [
      'base' => '<p>The specified pipeline was not found. Verify that you used the correct user and account identifiers.</p>',
      'refs' => [],
    ],
    'PipelineObject' => [
      'base' => '<p>Contains information about a pipeline object. This can be a logical, physical, or physical attempt pipeline object. The complete set of components of a pipeline defines the pipeline.</p>',
      'refs' => [
        'PipelineObjectList$member' => NULL,
        'PipelineObjectMap$value' => NULL,
      ],
    ],
    'PipelineObjectList' => [
      'base' => NULL,
      'refs' => [
        'DescribeObjectsOutput$pipelineObjects' => '<p>An array of object definitions that are returned by the call to <a>DescribeObjects</a>.</p>',
        'GetPipelineDefinitionOutput$pipelineObjects' => '<p>An array of objects defined in the pipeline.</p>',
        'PutPipelineDefinitionInput$pipelineObjects' => '<p>The objects that define the pipeline. These will overwrite the existing pipeline definition.</p>',
        'ValidatePipelineDefinitionInput$pipelineObjects' => '<p>A list of objects that define the pipeline changes to validate against the pipeline.</p>',
      ],
    ],
    'PipelineObjectMap' => [
      'base' => NULL,
      'refs' => [
        'TaskObject$objects' => '<p>Connection information for the location where the task runner will publish the output of the task.</p>',
      ],
    ],
    'PollForTaskInput' => [
      'base' => '<p>The data type passed in as input to the PollForTask action.</p>',
      'refs' => [],
    ],
    'PollForTaskOutput' => [
      'base' => '<p>Contains the output from the PollForTask action.</p>',
      'refs' => [],
    ],
    'PutPipelineDefinitionInput' => [
      'base' => '<p>The input of the <a>PutPipelineDefinition</a> action.</p>',
      'refs' => [],
    ],
    'PutPipelineDefinitionOutput' => [
      'base' => '<p>Contains the output of the <a>PutPipelineDefinition</a> action.</p>',
      'refs' => [],
    ],
    'Query' => [
      'base' => '<p>Defines the query to run against an object.</p>',
      'refs' => [
        'QueryObjectsInput$query' => '<p> Query that defines the objects to be returned. The <a>Query</a> object can contain a maximum of ten selectors. The conditions in the query are limited to top-level String fields in the object. These filters can be applied to components, instances, and attempts. </p>',
      ],
    ],
    'QueryObjectsInput' => [
      'base' => '<p>The input for the <a>QueryObjects</a> action.</p>',
      'refs' => [],
    ],
    'QueryObjectsOutput' => [
      'base' => '<p>Contains the output from the <a>QueryObjects</a> action.</p>',
      'refs' => [],
    ],
    'ReportTaskProgressInput' => [
      'base' => '<p>The input for the ReportTaskProgress action.</p>',
      'refs' => [],
    ],
    'ReportTaskProgressOutput' => [
      'base' => '<p>Contains the output from the ReportTaskProgress action.</p>',
      'refs' => [],
    ],
    'ReportTaskRunnerHeartbeatInput' => [
      'base' => '<p>The input for the ReportTaskRunnerHeartbeat action.</p>',
      'refs' => [],
    ],
    'ReportTaskRunnerHeartbeatOutput' => [
      'base' => '<p>Contains the output from the <a>ReportTaskRunnerHeartbeat</a> action.</p>',
      'refs' => [],
    ],
    'Selector' => [
      'base' => '<p>A comparision that is used to determine whether a query should return this object.</p>',
      'refs' => [
        'SelectorList$member' => NULL,
      ],
    ],
    'SelectorList' => [
      'base' => '<p>The list of Selectors that define queries on individual fields.</p>',
      'refs' => [
        'Query$selectors' => '<p>List of selectors that define the query. An object must satisfy all of the selectors to match the query.</p>',
      ],
    ],
    'SetStatusInput' => [
      'base' => '<p>The input to the <a>SetStatus</a> action.</p>',
      'refs' => [],
    ],
    'SetTaskStatusInput' => [
      'base' => '<p>The input of the SetTaskStatus action.</p>',
      'refs' => [],
    ],
    'SetTaskStatusOutput' => [
      'base' => '<p>The output from the <a>SetTaskStatus</a> action.</p>',
      'refs' => [],
    ],
    'TaskNotFoundException' => [
      'base' => '<p>The specified task was not found. </p>',
      'refs' => [],
    ],
    'TaskObject' => [
      'base' => '<p>Contains information about a pipeline task that is assigned to a task runner.</p>',
      'refs' => [
        'PollForTaskOutput$taskObject' => '<p>An instance of <a>TaskObject</a>. The returned object contains all the information needed to complete the task that is being assigned to the task runner. One of the fields returned in this object is taskId, which contains an identifier for the task being assigned. The calling task runner uses taskId in subsequent calls to <a>ReportTaskProgress</a> and <a>SetTaskStatus</a>.</p>',
      ],
    ],
    'TaskStatus' => [
      'base' => NULL,
      'refs' => [
        'SetTaskStatusInput$taskStatus' => '<p>If <code>FINISHED</code>, the task successfully completed. If <code>FAILED</code> the task ended unsuccessfully. The <code>FALSE</code> value is used by preconditions.</p>',
      ],
    ],
    'ValidatePipelineDefinitionInput' => [
      'base' => '<p>The input of the <a>ValidatePipelineDefinition</a> action.</p>',
      'refs' => [],
    ],
    'ValidatePipelineDefinitionOutput' => [
      'base' => '<p>Contains the output from the <a>ValidatePipelineDefinition</a> action.</p>',
      'refs' => [],
    ],
    'ValidationError' => [
      'base' => '<p>Defines a validation error returned by <a>PutPipelineDefinition</a> or <a>ValidatePipelineDefinition</a>. Validation errors prevent pipeline activation. The set of validation errors that can be returned are defined by AWS Data Pipeline.</p>',
      'refs' => [
        'ValidationErrors$member' => NULL,
      ],
    ],
    'ValidationErrors' => [
      'base' => NULL,
      'refs' => [
        'PutPipelineDefinitionOutput$validationErrors' => '<p>A list of the validation errors that are associated with the objects defined in <code>pipelineObjects</code>.</p>',
        'ValidatePipelineDefinitionOutput$validationErrors' => '<p>Lists the validation errors that were found by <a>ValidatePipelineDefinition</a>.</p>',
      ],
    ],
    'ValidationWarning' => [
      'base' => '<p>Defines a validation warning returned by <a>PutPipelineDefinition</a> or <a>ValidatePipelineDefinition</a>. Validation warnings do not prevent pipeline activation. The set of validation warnings that can be returned are defined by AWS Data Pipeline.</p>',
      'refs' => [
        'ValidationWarnings$member' => NULL,
      ],
    ],
    'ValidationWarnings' => [
      'base' => NULL,
      'refs' => [
        'PutPipelineDefinitionOutput$validationWarnings' => '<p>A list of the validation warnings that are associated with the objects defined in <code>pipelineObjects</code>.</p>',
        'ValidatePipelineDefinitionOutput$validationWarnings' => '<p>Lists the validation warnings that were found by <a>ValidatePipelineDefinition</a>.</p>',
      ],
    ],
    'attributeNameString' => [
      'base' => NULL,
      'refs' => [
        'ParameterAttribute$key' => '<p>The field identifier.</p>',
      ],
    ],
    'attributeValueString' => [
      'base' => NULL,
      'refs' => [
        'ParameterAttribute$stringValue' => '<p>The field value, expressed as a String.</p>',
      ],
    ],
    'boolean' => [
      'base' => NULL,
      'refs' => [
        'DescribeObjectsInput$evaluateExpressions' => '<p>Indicates whether any expressions in the object should be evaluated when the object descriptions are returned.</p>',
        'DescribeObjectsOutput$hasMoreResults' => '<p>If <code>True</code>, there are more pages of results to return.</p>',
        'ListPipelinesOutput$hasMoreResults' => '<p>If <code>True</code>, there are more results that can be obtained by a subsequent call to <a>ListPipelines</a>.</p>',
        'PutPipelineDefinitionOutput$errored' => '<p>If <code>True</code>, there were validation errors. If errored is <code>True</code>, the pipeline definition is stored but cannot be activated until you correct the pipeline and call <a>PutPipelineDefinition</a> to commit the corrected pipeline.</p>',
        'QueryObjectsOutput$hasMoreResults' => '<p>If <code>True</code>, there are more results that can be obtained by a subsequent call to <a>QueryObjects</a>.</p>',
        'ReportTaskProgressOutput$canceled' => '<p>If <code>True</code>, the calling task runner should cancel processing of the task. The task runner does not need to call <a>SetTaskStatus</a> for canceled tasks.</p>',
        'ReportTaskRunnerHeartbeatOutput$terminate' => '<p>Indicates whether the calling task runner should terminate. If <code>True</code>, the task runner that called <a>ReportTaskRunnerHeartbeat</a> should terminate. </p>',
        'ValidatePipelineDefinitionOutput$errored' => '<p>If <code>True</code>, there were validation errors.</p>',
      ],
    ],
    'errorMessage' => [
      'base' => NULL,
      'refs' => [
        'InternalServiceError$message' => '<p>Description of the error message.</p>',
        'InvalidRequestException$message' => '<p>Description of the error message.</p>',
        'PipelineDeletedException$message' => '<p>Description of the error message.</p>',
        'PipelineNotFoundException$message' => '<p>Description of the error message.</p>',
        'SetTaskStatusInput$errorMessage' => '<p>If an error occurred during the task, this value specifies a text description of the error. This value is set on the physical attempt object. It is used to display error information to the user. The web service does not parse this value.</p>',
        'TaskNotFoundException$message' => '<p>Description of the error message.</p>',
      ],
    ],
    'fieldList' => [
      'base' => NULL,
      'refs' => [
        'PipelineDescription$fields' => '<p>A list of read-only fields that contain metadata about the pipeline: @userId, @accountId, and @pipelineState.</p>',
        'PipelineObject$fields' => '<p>Key-value pairs that define the properties of the object.</p>',
        'ReportTaskProgressInput$fields' => '<p>Key-value pairs that define the properties of the ReportTaskProgressInput object.</p>',
      ],
    ],
    'fieldNameString' => [
      'base' => NULL,
      'refs' => [
        'Field$key' => '<p>The field identifier.</p>',
        'Field$refValue' => '<p>The field value, expressed as the identifier of another object.</p>',
        'ParameterObject$id' => '<p>Identifier of the parameter object. </p>',
        'ParameterValue$id' => '<p>Identifier of the parameter value.</p>',
      ],
    ],
    'fieldStringValue' => [
      'base' => NULL,
      'refs' => [
        'Field$stringValue' => '<p>The field value, expressed as a String.</p>',
        'ParameterValue$stringValue' => '<p>The field value, expressed as a String.</p>',
      ],
    ],
    'id' => [
      'base' => NULL,
      'refs' => [
        'ActivatePipelineInput$pipelineId' => '<p>The identifier of the pipeline to activate. </p>',
        'CreatePipelineInput$name' => '<p> The name of the new pipeline. You can use the same name for multiple pipelines associated with your AWS account, because AWS Data Pipeline assigns each new pipeline a unique pipeline identifier. </p>',
        'CreatePipelineInput$uniqueId' => '<p> A unique identifier that you specify. This identifier is not the same as the pipeline identifier assigned by AWS Data Pipeline. You are responsible for defining the format and ensuring the uniqueness of this identifier. You use this parameter to ensure idempotency during repeated calls to <a>CreatePipeline</a>. For example, if the first call to <a>CreatePipeline</a> does not return a clear success, you can pass in the same unique identifier and pipeline name combination on a subsequent call to <a>CreatePipeline</a>. <a>CreatePipeline</a> ensures that if a pipeline already exists with the same name and unique identifier, a new pipeline will not be created. Instead, you\'ll receive the pipeline identifier from the previous attempt. The uniqueness of the name and unique identifier combination is scoped to the AWS account or IAM user credentials. </p>',
        'CreatePipelineOutput$pipelineId' => '<p>The ID that AWS Data Pipeline assigns the newly created pipeline. The ID is a string of the form: df-06372391ZG65EXAMPLE.</p>',
        'DeletePipelineInput$pipelineId' => '<p>The identifier of the pipeline to be deleted.</p>',
        'DescribeObjectsInput$pipelineId' => '<p>Identifier of the pipeline that contains the object definitions.</p>',
        'EvaluateExpressionInput$pipelineId' => '<p>The identifier of the pipeline.</p>',
        'EvaluateExpressionInput$objectId' => '<p>The identifier of the object.</p>',
        'GetPipelineDefinitionInput$pipelineId' => '<p>The identifier of the pipeline.</p>',
        'PipelineDescription$pipelineId' => '<p>The pipeline identifier that was assigned by AWS Data Pipeline. This is a string of the form <code>df-297EG78HU43EEXAMPLE</code>.</p>',
        'PipelineDescription$name' => '<p>Name of the pipeline.</p>',
        'PipelineIdName$id' => '<p>Identifier of the pipeline that was assigned by AWS Data Pipeline. This is a string of the form <code>df-297EG78HU43EEXAMPLE</code>.</p>',
        'PipelineIdName$name' => '<p>Name of the pipeline.</p>',
        'PipelineObject$id' => '<p>Identifier of the object.</p>',
        'PipelineObject$name' => '<p>Name of the object.</p>',
        'PipelineObjectMap$key' => NULL,
        'PollForTaskInput$hostname' => '<p>The public DNS name of the calling task runner.</p>',
        'PutPipelineDefinitionInput$pipelineId' => '<p>The identifier of the pipeline to be configured.</p>',
        'QueryObjectsInput$pipelineId' => '<p>Identifier of the pipeline to be queried for object names.</p>',
        'ReportTaskRunnerHeartbeatInput$taskrunnerId' => '<p>The identifier of the task runner. This value should be unique across your AWS account. In the case of AWS Data Pipeline Task Runner launched on a resource managed by AWS Data Pipeline, the web service provides a unique identifier when it launches the application. If you have written a custom task runner, you should assign a unique identifier for the task runner.</p>',
        'ReportTaskRunnerHeartbeatInput$hostname' => '<p>The public DNS name of the calling task runner.</p>',
        'SetStatusInput$pipelineId' => '<p>Identifies the pipeline that contains the objects.</p>',
        'TaskObject$pipelineId' => '<p>Identifier of the pipeline that provided the task.</p>',
        'TaskObject$attemptId' => '<p>Identifier of the pipeline task attempt object. AWS Data Pipeline uses this value to track how many times a task is attempted.</p>',
        'ValidatePipelineDefinitionInput$pipelineId' => '<p>Identifies the pipeline whose definition is to be validated.</p>',
        'ValidationError$id' => '<p>The identifier of the object that contains the validation error.</p>',
        'ValidationWarning$id' => '<p>The identifier of the object that contains the validation warning.</p>',
        'idList$member' => NULL,
      ],
    ],
    'idList' => [
      'base' => NULL,
      'refs' => [
        'DescribeObjectsInput$objectIds' => '<p>Identifiers of the pipeline objects that contain the definitions to be described. You can pass as many as 25 identifiers in a single call to DescribeObjects.</p>',
        'DescribePipelinesInput$pipelineIds' => '<p>Identifiers of the pipelines to describe. You can pass as many as 25 identifiers in a single call to <a>DescribePipelines</a>. You can obtain pipeline identifiers by calling <a>ListPipelines</a>.</p>',
        'QueryObjectsOutput$ids' => '<p>A list of identifiers that match the query selectors.</p>',
        'SetStatusInput$objectIds' => '<p>Identifies an array of objects. The corresponding objects can be either physical or components, but not a mix of both types.</p>',
      ],
    ],
    'int' => [
      'base' => NULL,
      'refs' => [
        'QueryObjectsInput$limit' => '<p>Specifies the maximum number of object names that <a>QueryObjects</a> will return in a single call. The default value is 100. </p>',
      ],
    ],
    'longString' => [
      'base' => NULL,
      'refs' => [
        'EvaluateExpressionInput$expression' => '<p>The expression to evaluate.</p>',
        'EvaluateExpressionOutput$evaluatedExpression' => '<p>The evaluated expression.</p>',
      ],
    ],
    'pipelineList' => [
      'base' => NULL,
      'refs' => [
        'ListPipelinesOutput$pipelineIdList' => '<p> A list of all the pipeline identifiers that your account has permission to access. If you require additional information about the pipelines, you can use these identifiers to call <a>DescribePipelines</a> and <a>GetPipelineDefinition</a>. </p>',
      ],
    ],
    'string' => [
      'base' => NULL,
      'refs' => [
        'CreatePipelineInput$description' => '<p>The description of the new pipeline.</p>',
        'DescribeObjectsInput$marker' => '<p>The starting point for the results to be returned. The first time you call <a>DescribeObjects</a>, this value should be empty. As long as the action returns <code>HasMoreResults</code> as <code>True</code>, you can call <a>DescribeObjects</a> again and pass the marker value from the response to retrieve the next set of results.</p>',
        'DescribeObjectsOutput$marker' => '<p> The starting point for the next page of results. To view the next page of results, call <a>DescribeObjects</a> again with this marker value. </p>',
        'GetPipelineDefinitionInput$version' => '<p>The version of the pipeline definition to retrieve. This parameter accepts the values <code>latest</code> (default] and <code>active</code>. Where <code>latest</code> indicates the last definition saved to the pipeline and <code>active</code> indicates the last definition of the pipeline that was activated.</p>',
        'InstanceIdentity$document' => '<p>A description of an Amazon EC2 instance that is generated when the instance is launched and exposed to the instance via the instance metadata service in the form of a JSON representation of an object.</p>',
        'InstanceIdentity$signature' => '<p>A signature which can be used to verify the accuracy and authenticity of the information provided in the instance identity document.</p>',
        'ListPipelinesInput$marker' => '<p>The starting point for the results to be returned. The first time you call <a>ListPipelines</a>, this value should be empty. As long as the action returns <code>HasMoreResults</code> as <code>True</code>, you can call <a>ListPipelines</a> again and pass the marker value from the response to retrieve the next set of results.</p>',
        'ListPipelinesOutput$marker' => '<p>If not null, indicates the starting point for the set of pipeline identifiers that the next call to <a>ListPipelines</a> will retrieve. If null, there are no more pipeline identifiers.</p>',
        'PipelineDescription$description' => '<p>Description of the pipeline.</p>',
        'PollForTaskInput$workerGroup' => '<p>Indicates the type of task the task runner is configured to accept and process. The worker group is set as a field on objects in the pipeline when they are created. You can only specify a single value for <code>workerGroup</code> in the call to <a>PollForTask</a>. There are no wildcard values permitted in <code>workerGroup</code>, the string must be an exact, case-sensitive, match. </p>',
        'QueryObjectsInput$sphere' => '<p> Specifies whether the query applies to components or instances. Allowable values: <code>COMPONENT</code>, <code>INSTANCE</code>, <code>ATTEMPT</code>. </p>',
        'QueryObjectsInput$marker' => '<p> The starting point for the results to be returned. The first time you call <a>QueryObjects</a>, this value should be empty. As long as the action returns <code>HasMoreResults</code> as <code>True</code>, you can call <a>QueryObjects</a> again and pass the marker value from the response to retrieve the next set of results. </p>',
        'QueryObjectsOutput$marker' => '<p> The starting point for the results to be returned. As long as the action returns <code>HasMoreResults</code> as <code>True</code>, you can call <a>QueryObjects</a> again and pass the marker value from the response to retrieve the next set of results. </p>',
        'ReportTaskRunnerHeartbeatInput$workerGroup' => '<p>Indicates the type of task the task runner is configured to accept and process. The worker group is set as a field on objects in the pipeline when they are created. You can only specify a single value for <code>workerGroup</code> in the call to <a>ReportTaskRunnerHeartbeat</a>. There are no wildcard values permitted in <code>workerGroup</code>, the string must be an exact, case-sensitive, match.</p>',
        'Selector$fieldName' => '<p>The name of the field that the operator will be applied to. The field name is the "key" portion of the field definition in the pipeline definition syntax that is used by the AWS Data Pipeline API. If the field is not set on the object, the condition fails.</p>',
        'SetStatusInput$status' => '<p>Specifies the status to be set on all the objects in <code>objectIds</code>. For components, this can be either <code>PAUSE</code> or <code>RESUME</code>. For instances, this can be either <code>CANCEL</code>, <code>RERUN</code>, or <code>MARK_FINISHED</code>.</p>',
        'SetTaskStatusInput$errorId' => '<p>If an error occurred during the task, this value specifies an id value that represents the error. This value is set on the physical attempt object. It is used to display error information to the user. It should not start with string "Service_" which is reserved by the system.</p>',
        'SetTaskStatusInput$errorStackTrace' => '<p>If an error occurred during the task, this value specifies the stack trace associated with the error. This value is set on the physical attempt object. It is used to display error information to the user. The web service does not parse this value.</p>',
        'stringList$member' => NULL,
      ],
    ],
    'stringList' => [
      'base' => NULL,
      'refs' => [
        'Operator$values' => '<p>The value that the actual field value will be compared with.</p>',
      ],
    ],
    'taskId' => [
      'base' => NULL,
      'refs' => [
        'ReportTaskProgressInput$taskId' => '<p>Identifier of the task assigned to the task runner. This value is provided in the <a>TaskObject</a> that the service returns with the response for the <a>PollForTask</a> action.</p>',
        'SetTaskStatusInput$taskId' => '<p>Identifies the task assigned to the task runner. This value is set in the <a>TaskObject</a> that is returned by the <a>PollForTask</a> action.</p>',
        'TaskObject$taskId' => '<p>An internal identifier for the task. This ID is passed to the <a>SetTaskStatus</a> and <a>ReportTaskProgress</a> actions.</p>',
      ],
    ],
    'validationMessage' => [
      'base' => NULL,
      'refs' => [
        'validationMessages$member' => NULL,
      ],
    ],
    'validationMessages' => [
      'base' => NULL,
      'refs' => [
        'ValidationError$errors' => '<p>A description of the validation error.</p>',
        'ValidationWarning$warnings' => '<p>A description of the validation warning.</p>',
      ],
    ],
  ],
];
