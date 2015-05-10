<?php namespace Neomerx\JsonApi\Parameters;

/**
 * Copyright 2015 info@neomerx.com (www.neomerx.com)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use \Neomerx\JsonApi\Contracts\Parameters\MediaTypeInterface;
use \Neomerx\JsonApi\Contracts\Parameters\ParametersFactoryInterface;

/**
 * @package Neomerx\JsonApi
 */
class ParametersFactory implements ParametersFactoryInterface
{
    /**
     * @inheritdoc
     */
    public function createEncodingParameters(array $includePaths = null, array $fieldSets = null)
    {
        return new EncodingParameters($includePaths, $fieldSets);
    }

    /**
     * @inheritdoc
     */
    public function createMediaType($mediaType, $extensions)
    {
        return new MediaType($mediaType, $extensions);
    }

    /**
     * @inheritdoc
     */
    public function createParameters(
        MediaTypeInterface $inputType,
        MediaTypeInterface $outputType,
        array $includePaths = null,
        array $fieldSets = null,
        array $sortParameters = null,
        array $pagingParameters = null,
        array $filteringParameters = null,
        array $unrecognizedParameters = null
    ) {
        return new Parameters(
            $inputType,
            $outputType,
            $includePaths,
            $fieldSets,
            $sortParameters,
            $pagingParameters,
            $filteringParameters,
            $unrecognizedParameters
        );
    }

    /**
     * @inheritdoc
     */
    public function createParametersParser()
    {
        return new ParametersParser($this);
    }

    /**
     * @inheritdoc
     */
    public function createSortParam($sortField, $isAscending)
    {
        return new SortParameter($sortField, $isAscending);
    }
}