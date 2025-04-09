<!DOCTYPE html>
<html>
<head>
    <title>Instagram Feed</title>
    <style>
        .feed-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .feed-item {
            width: 300px;
        }

        .feed-item img {
            width: 100%;
            border-radius: 10px;
        }

        .caption {
            margin-top: 5px;
            font-size: 14px;
        }

        .timestamp {
            font-size: 12px;
            color: gray;
        }
    </style>
</head>
<body>
    <h2>Instagram Feed</h2>
    <div class="feed-container">
        @foreach ($feeds as $item)
            @if ($item['media_type'] === 'IMAGE' || $item['media_type'] === 'CAROUSEL_ALBUM')
                <div class="feed-item">
                    <a href="{{ $item['permalink'] }}" target="_blank">
                        <img src="{{ $item['media_url'] }}" alt="Instagram Image">
                    </a>
                    <div class="caption">{{ $item['caption'] ?? '' }}</div>
                    {{-- <div class="timestamp">{{ \Carbon\Carbon::parse($item['timestamp'])->diffForHumans() }}</div> --}}
                </div>
            @endif
        @endforeach
    </div>
</body>
</html>
