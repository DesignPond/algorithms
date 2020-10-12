<?php use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testSingle()
    {
        $solution = new src\Solution();

        $A = [4,1,2,1,2];

        $this->assertEquals(4,$solution->single($A));

        $A = [2,2,1];

        $this->assertEquals(1,$solution->single($A));

        $A = [1];

        $this->assertEquals(1,$solution->single($A));
    }

    public function testFindDifference()
    {
        $solution = new src\Solution();

        $s = 'abcd';
        $t = 'abcde';
        $this->assertEquals('e',$solution->findTheDifference($s, $t));

        $s = "";
        $t = "y";

        $this->assertEquals('y',$solution->findTheDifference($s, $t));

        $s = "a";
        $t = "aa";

        $this->assertEquals('a',$solution->findTheDifference($s, $t));

        $s = "ae";
        $t = "aea";

        $this->assertEquals('a',$solution->findTheDifference($s, $t));

        $s ="ymbgaraibkfmvocpizdydugvalagaivdbfsfbepeyccqfepzvtpyxtbadkhmwmoswrcxnargtlswqemafandgkmydtimuzvjwxvlfwlhvkrgcsithaqlcvrihrwqkpjdhgfgreqoxzfvhjzojhghfwbvpfzectwwhexthbsndovxejsntmjihchaotbgcysfdaojkjldprwyrnischrgmtvjcorypvopfmegizfkvudubnejzfqffvgdoxohuinkyygbdzmshvyqyhsozwvlhevfepdvafgkqpkmcsikfyxczcovrmwqxxbnhfzcjjcpgzjjfateajnnvlbwhyppdleahgaypxidkpwmfqwqyofwdqgxhjaxvyrzupfwesmxbjszolgwqvfiozofncbohduqgiswuiyddmwlwubetyaummenkdfptjczxemryuotrrymrfdxtrebpbjtpnuhsbnovhectpjhfhahbqrfbyxggobsweefcwxpqsspyssrmdhuelkkvyjxswjwofngpwfxvknkjviiavorwyfzlnktmfwxkvwkrwdcxjfzikdyswsuxegmhtnxjraqrdchaauazfhtklxsksbhwgjphgbasfnlwqwukprgvihntsyymdrfovaszjywuqygpvjtvlsvvqbvzsmgweiayhlubnbsitvfxawhfmfiatxvqrcwjshvovxknnxnyyfexqycrlyksderlqarqhkxyaqwlwoqcribumrqjtelhwdvaiysgjlvksrfvjlcaiwrirtkkxbwgicyhvakxgdjwnwmubkiazdjkfmotglclqndqjxethoutvjchjbkoasnnfbgrnycucfpeovruguzumgmgddqwjgdvaujhyqsqtoexmnfuluaqbxoofvotvfoiexbnprrxptchmlctzgqtkivsilwgwgvpidpvasurraqfkcmxhdapjrlrnkbklwkrvoaziznlpor";
        $t = "qhxepbshlrhoecdaodgpousbzfcqjxulatciapuftffahhlmxbufgjuxstfjvljybfxnenlacmjqoymvamphpxnolwijwcecgwbcjhgdybfffwoygikvoecdggplfohemfypxfsvdrseyhmvkoovxhdvoavsqqbrsqrkqhbtmgwaurgisloqjixfwfvwtszcxwktkwesaxsmhsvlitegrlzkvfqoiiwxbzskzoewbkxtphapavbyvhzvgrrfriddnsrftfowhdanvhjvurhljmpxvpddxmzfgwwpkjrfgqptrmumoemhfpojnxzwlrxkcafvbhlwrapubhveattfifsmiounhqusvhywnxhwrgamgnesxmzliyzisqrwvkiyderyotxhwspqrrkeczjysfujvovsfcfouykcqyjoobfdgnlswfzjmyucaxuaslzwfnetekymrwbvponiaojdqnbmboldvvitamntwnyaeppjaohwkrisrlrgwcjqqgxeqerjrbapfzurcwxhcwzugcgnirkkrxdthtbmdqgvqxilllrsbwjhwqszrjtzyetwubdrlyakzxcveufvhqugyawvkivwonvmrgnchkzdysngqdibhkyboyftxcvvjoggecjsajbuqkjjxfvynrjsnvtfvgpgveycxidhhfauvjovmnbqgoxsafknluyimkczykwdgvqwlvvgdmufxdypwnajkncoynqticfetcdafvtqszuwfmrdggifokwmkgzuxnhncmnsstffqpqbplypapctctfhqpihavligbrutxmmygiyaklqtakdidvnvrjfteazeqmbgklrgrorudayokxptswwkcircwuhcavhdparjfkjypkyxhbgwxbkvpvrtzjaetahmxevmkhdfyidhrdeejapfbafwmdqjqszwnwzgclitdhlnkaiyldwkwwzvhyorgbysyjbxsspnjdewjxbhpsvj";

        $this->assertEquals('t',$solution->findTheDifference($s, $t));
    }

    public function testIsPalindrome()
    {
        $solution = new src\Solution();

        $S = "aba";

        $this->assertTrue($solution->palindrome($S));

        $S = "abca";

        $this->assertTrue($solution->palindrome($S));

        $S = "cadop";

        $this->assertFalse($solution->palindrome($S));

        $S = "cadopdac";

        $this->assertTrue($solution->palindrome($S));

        $S = "abc";

        $this->assertFalse($solution->palindrome($S));

        $S = "ffauugjyulaqbbiompuervdpseosxycadcbqrxfiavbhtwwmesdyqqrohqbckgrvemtiwjmfspnlqrqlnugxuprtojqawmebkrquijqooiqyuuxduxnfrryyuhsaegwbkfxilmisspeqrcxnmslvpcbjiesdmzfzdwnzpjkogmnomlarvunoacradtwyfcnbwuoevqjotgtoubpzxresjzldmzpsyicrzgsvtxkxzvrgxdbqfcicbwlabzgtpnjidfgzuwxyglftbzirdlkxohebyceyqxigexttrddalsxijtboijkugqwipdiddhtctyybpxvkideakrvntgmlxmcwsurvdsuvhcvmnwrqtgsirydsoycooopkziuxejasdxsdwalckdhkgdwpajbosrqqrkckibifcokhuhsdtkrooqoositozdqnoaljlgamhhrmlynigwjfkcsndzzmeisfoewtacxjqcjdlprlwrivsazpajcbrlznrxsmqywzxuhbyescklxunlldpnpuigmxnlirewsjpahkkizinubljrjpflysdzboecexptznftbnxnkuzflanypgpkebfrmnhoqgdynwnegxfzeqefsoagxceekpeentlzbsyluupegmgdywjksozqdsdfldnfpqafzzlqonprvrvowrlwjoohpzbcylqtpfxjvowljmjxcjqpxotmlvvbsnpytujcpxydzyjubvqbovgtkjlenrhoiqzwtaomwleuiqlyzwwvsghqafjrtdzqsrvzgbozqqfqijsldawnozatyrzgypzcywftrksunpoqkmuwljrpkweeujoytkrgpsxnliynvenzsrnyhqoyjngdsxojvmysxsyuoqsjbmhyqwbgyjaacxfzdmdqjhceohyijonzadvqhvmjgpqeiugbowaafsucuuyyyqhhcsmlqygqgpjbjrmqghtypwumtkijyhpdpmpoqtoeijcpseriq";

        $this->assertFalse($solution->palindrome($S));
    }
}
