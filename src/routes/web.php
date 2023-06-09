<?php

use Illuminate\Support\Facades\Route;
use Tech101\GitWebhook\Http\Controller\GithubController;
use Tech101\GitWebhook\Http\Controller\GitlabController;

Route::group(["prefix" => "webhook", "as" => "webhook."], function () {
    Route::group(["prefix" => "gitlab", "as" => "gitlab."], function () {
        Route::post("merge-request", [GitlabController::class, 'mergeRequest'])->name("merge-request");
        Route::post("tag-push", [GitlabController::class, 'tagPush'])->name("tag-push");
        Route::post("test", [GitlabController::class, 'test'])->name("test");
    });

    Route::group(["prefix" => "github", "as" => "github."], function () {
        Route::post("pull-request", [GithubController::class, 'pullRequest'])->name("pull-request");
        Route::post("tag-create", [GithubController::class, 'tagCreate'])->name("tag-create");
        Route::post("test", [GithubController::class, 'test'])->name("test");
    });
});
