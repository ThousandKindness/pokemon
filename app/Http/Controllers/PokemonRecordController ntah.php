use App\Http\Resources\PokemonRecordResource;
use App\Models\PokemonRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PokemonRecordController extends Controller {

  public function index(Request $request) {

    // Pagination for large datasets (use cursor for millions)
    $records = PokemonRecord::query()
    ->when($request->name, fn($q) => $q->where('name', $request->name))
    ->when($request->base_experience, fn($q) => $q->where('base_experience', $request->base_experience))
    ->when($request->weight, fn($q) => $q->where('weight', $request->weight))
    ->orderBy('id')
    ->cursorPaginate(10); // Cursor pagination for efficiency

    return PokemonRecordResource::collection($records);
  }

  public function show(PokemonRecord $pokemonRecord) {
    return new PokemonRecordResource($pokemonRecord);
  }

  // Add store, update, destroy as needed...
  public function stats() {
  // Cache aggregates for performance
    return Cache::remember('Pokemon_stats', 3600, function () { // 1 hour
      return [
      'total_loss' => DB::table('deforestation_records')->sum('area_lost'),
      'loss_by_year' => DB::table('deforestation_records')
      ->select('year', DB::raw('SUM(area_lost) as total'))
      ->groupBy('year')
      ->get(),
      ];
    });
  }
}