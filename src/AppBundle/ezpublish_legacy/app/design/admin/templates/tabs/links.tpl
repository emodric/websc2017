{symfony_render(
    symfony_controller(
        'AppBundle:Content:contentUrls',
        hash(
            'contentId', $node.object.id
        )
    )
)}
