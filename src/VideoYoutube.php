<?php

namespace Montri\VideoYoutube;

use Exception;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class VideoYoutube extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'video-youtube';
    private $onlyAllowValid = false;



    /**
     * Sets if the Image in the Index View can be clicked at. (INDEX VIEW ONLY)
     *
     * @param  bool $click
     * @return $this
     */
    public function clickable(bool $click = true)
    {
        return $this->withMeta(['indexClickable' => $click]);
    }

    /**
     * Sets if the Video gets opened in the same Tab or new Tab (INDEX ONLY - WORKS ONLY WITH CLICKABLE)
     *
     * @param  bool $click
     * @return $this
     */

    public function openInSameTab(bool $tab = false)
    {
        return $this->withMeta(['indexinSameTab' => $tab]);
    }



    /**
     * Sets the Width of the Video in Detail View.
     *
     * @param  bool $click
     * @return $this
     */
    public function withWidth($width)
    {
        return $this->withMeta(['detailWidth' => $width]);
    }


    /**
     * Sets the Height of the Video in Detail View.
     *
     * @param  bool $click
     * @return $this
     */
    public function withHeight($height)
    {
        return $this->withMeta(['detailHeight' => $height]);
    }


    public function onlyAllowValidLinks(bool $valid = true)
    {
        $this->onlyAllowValid = $valid;
        return $this;
    }


    protected function fillAttributeFromRequest(NovaRequest $request,
                                                            $requestAttribute,
                                                            $model,
                                                            $attribute)
    {

        if($this->onlyAllowValid)
        {
            if(preg_match("/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/watch\?v\=\w+$/", $request[$requestAttribute]))
            {
                if ($request->exists($requestAttribute)) {
                    $model->{$attribute} = $request[$requestAttribute];
                }
            }
            else
            {
                throw_if(
                    true,
                    Exception::class,
                    'Request denied. Invalid Youtube Link entered.'
                );
            }
        }

    }
}
