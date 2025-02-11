@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-3">Cây Gia Phả</h2>
        <div id="tree"></div>
    </div>

    <script src="https://cdn.balkan.app/js/familytree.js"></script>
    <script>
        //JavaScript
        var options = getOptions();
        var family = new FamilyTree(document.getElementById("tree"), {
            mouseScrool: FamilyTree.none,
            scaleInitial: options.scaleInitial,
            siblingSeparation: 120,
            editForm: {readOnly: true},
            template: 'john',
            nodeBinding: {
                field_0: "name",
                field_1: "title",
                field_2: "id",
                img_0: "img",
            },
            nodeContextMenu:{
                details: {text:"Details"},
            }
        });

        var data = @json($familyMembers);

        var treeData = data.map(member => ({
            id: member.user_id, // Gán id theo user_id
            name: member.name,
            title: member.title ?? "",
            img: member.image_url ?? "",
            pids: member.partner_id ? [member.partner_id] : [],
            fid: member.father_id,
            mid: member.mother_id,
            gender: member.gender
        }));

        function getOptions() {
            const searchParams = new URLSearchParams(window.location.search);
            var fit = searchParams.get('fit');
            var enableSearch = true;
            var scaleInitial = 1;
            if (fit == 'yes') {
                enableSearch = false;
                scaleInitial = FamilyTree.match.boundary;
            }
            return {
                enableSearch,
                scaleInitial
            };
        }

        family.load(treeData);
    </script>
@endsection
