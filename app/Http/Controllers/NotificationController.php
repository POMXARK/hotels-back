<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    public function index(): JsonResponse
    {
        $notifications = Notification::all();
        return response()->json($notifications);
    }

    public function markAsRead(string $id): JsonResponse
    {
        $notification = Notification::find($id);
        if ($notification) {
            $notification->read_at = now();
            $notification->save();
            return response()->json(['message' => 'Уведомление отмечено как прочитанное']);
        }
        return response()->json(['error' => 'Уведомление не найдено'], 404);
    }

    public function destroy(string $id): JsonResponse
    {
        $notification = Notification::find($id);
        if ($notification) {
            $notification->delete();
            return response()->json(['message' => 'Уведомление удалено']);
        }
        return response()->json(['error' => 'Уведомление не найдено'], 404);
    }

    public function count(): JsonResponse
    {
        return response()->json(['count' => Notification::count()]);
    }
}
